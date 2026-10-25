<?php

namespace App\Http\Controllers;

use App\Models\Alumnireg;
use App\Models\Donation;
use App\Models\DueRequest;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Event;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /*
    |---------------------------------------------
    | SERVICE REQUEST QUERY
    |---------------------------------------------
    */
    private function serviceRequestQuery($search = null)
    {
        return ServiceRequest::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('matricno', 'like', "%{$search}%")
                      ->orWhere('organization', 'like', "%{$search}%")
                      ->orWhere('country', 'like', "%{$search}%")
                      ->orWhere('service_type', 'like', "%{$search}%")
                      ->orWhere('request_method', 'like', "%{$search}%")
                      ->orWhere('transaction_id', 'like', "%{$search}%");
                });
            });
    }

    /*
    |---------------------------------------------
    | DUE REQUEST QUERY
    |---------------------------------------------
    */
    private function dueRequestQuery($search = null)
    {
        return DueRequest::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('matricno', 'like', "%{$search}%")
                      ->orWhere('service_type', 'like', "%{$search}%")
                      ->orWhere('request_method', 'like', "%{$search}%")
                      ->orWhere('transaction_id', 'like', "%{$search}%");
                });
            });
    }

        private function alumniregRequestQuery($search = null)
    {
        return Alumnireg::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('matricno', 'like', "%{$search}%")
                      ->orWhere('service_type', 'like', "%{$search}%")
                      ->orWhere('request_method', 'like', "%{$search}%")
                      ->orWhere('transaction_id', 'like', "%{$search}%");
                });
            });
    }

        private function donationHistoryQuery($search = null)
    {
        return Donation::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('matricno', 'like', "%{$search}%")
                      ->orWhere('service_type', 'like', "%{$search}%")
                      ->orWhere('request_method', 'like', "%{$search}%")
                      ->orWhere('transaction_id', 'like', "%{$search}%");
                });
            });
    }

    /*
    |---------------------------------------------
    | SERVICE REQUESTS PAGE
    |---------------------------------------------
    */
    public function serviceRequests(Request $request)
    {
         if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $serviceRequests = $this->serviceRequestQuery($request->search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.service-requests', compact('serviceRequests'));
    }

        public function serviceRequestsug(Request $request)
    {
         if (auth()->user()->user_type !== 'adminug') {
                 return redirect()->route('home');
        }
        $serviceRequests = $this->serviceRequestQuery($request->search)

            ->where("graduate_category","UNDERGRADUATE")
             ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.service-requestsug', compact('serviceRequests'));
    }

        public function serviceRequestspg(Request $request)
    {
         if (auth()->user()->user_type !== 'adminpg') {
                 return redirect()->route('home');
        }
        $serviceRequests = $this->serviceRequestQuery($request->search)
            ->where("graduate_category","POSTGRADUATE")
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.service-requestspg', compact('serviceRequests'));
    }

    /*
    |---------------------------------------------
    | UPDATE STATUS
    |---------------------------------------------
    */
    public function updateServiceStatus(Request $request, $id)
    {
        $request->validate([
            'request_status' => 'required|string'
        ]);

        ServiceRequest::where('id', $id)->update([
            'request_status' => $request->request_status,
            'updated_at' => now()
        ]);

        return back()->with('message', 'Request status updated successfully');
    }

    /*
    |---------------------------------------------
    | DUE REQUESTS PAGE
    |---------------------------------------------
    */
    public function dueRequests(Request $request)
    {
        if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $dueRequests = $this->dueRequestQuery($request->search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.due-requests', compact('dueRequests'));
    }

     public function alumniregRequests(Request $request)
    {
        if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $alumniregRequests = $this->alumniregRequestQuery($request->search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.alumnireg-requests', compact('alumniregRequests'));
    }

      public function donationHistory(Request $request)
    {
        if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $donationhistory = $this->donationHistoryQuery($request->search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.donation-history', compact('donationhistory'));
    }


      public function alumniregHistory(Request $request)
    {
        if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $donationhistory = $this->alumniregHistoryQuery($request->search)
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.alumnireg-history', compact('donationhistory'));
    }

    /*
    |---------------------------------------------
    | EXPORT SERVICE CSV (SEARCH AWARE)
    |---------------------------------------------
    */
   public function exportServiceRequestsCsv(Request $request)
{
    if (!auth()->check() || !in_array(auth()->user()->user_type, ['adminpg','admin','adminug'])) {
        return redirect()->route('home');
    }

    $query = $this->serviceRequestQuery($request->search);

    $userType = auth()->user()->user_type;

    if ($userType == 'adminug') {
        $query->where("graduate_category", "UNDERGRADUATE");
    } elseif ($userType == 'adminpg') {
        $query->where("graduate_category", "POSTGRADUATE");
    }
    // admin sees everything (no filter)

    $serviceRequests = $query->latest()->get();

    return response()->stream(function () use ($serviceRequests) {

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'Matric No',
            'Organization',
            'Country',
            'Service Type',
            'Request Method',
            'Amount',
            'Request Status',
            'Payment',
            'Transaction ID',
            'Date'
        ]);

        foreach ($serviceRequests as $r) {
            fputcsv($file, [
                $r->matricno,
                $r->organization,
                $r->country,
                $r->service_type,
                $r->request_method,
                $r->amount,
                $r->request_status,
                $r->payment,
                $r->transaction_id,
                $r->created_at
            ]);
        }

        fclose($file);

    }, 200, [
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename=service_requests.csv",
    ]);
}




    /*
    |---------------------------------------------
    | EXPORT DUE CSV (SEARCH AWARE)
    |---------------------------------------------
    */
    public function exportDueRequestsCsv(Request $request)
    {
        if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $dueRequests = $this->dueRequestQuery($request->search)
            ->latest()
            ->get();

        return response()->stream(function () use ($dueRequests) {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Matric No',
                'Fee Type',
                'Year',
                'Amount',
                'Status',
                'Payment',
                'Transaction ID',
                'Gateway',
                'Date'
            ]);

            foreach ($dueRequests as $d) {
                fputcsv($file, [
                    $d->matricno,
                    $d->service_type,
                    $d->request_method,
                    $d->amount,
                    $d->status,
                    $d->payment,
                    $d->transaction_id,
                    $d->pay_channel,
                    $d->created_at
                ]);
            }

            fclose($file);

        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=due_requests.csv",
        ]);
    }



     public function exportAlumniregRequestsCsv(Request $request)
    {
        if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $alumniregRequests = $this->alumniregRequestQuery($request->search)
            ->latest()
            ->get();

        return response()->stream(function () use ($alumniregRequests) {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Matric No',
                'Fee Type',
                'Amount',
                'Status',
                'Payment',
                'Transaction ID',
                'Gateway',
                'Date'
            ]);

            foreach ($alumniregRequests as $d) {
                fputcsv($file, [
                    $d->matricno,
                    $d->service_type,
                    $d->amount,
                    $d->status,
                    $d->payment,
                    $d->transaction_id,
                    $d->pay_channel,
                    $d->created_at
                ]);
            }

            fclose($file);

        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=alumnireg.csv",
        ]);
    }




     public function exportDonationHistoryCsv(Request $request)
    {
          if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
        $donationhistory = $this->donationHistoryQuery($request->search)
            ->latest()
            ->get();

        return response()->stream(function () use ($donationhistory) {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Matric No',
                'Fee Type',
                'Year',
                'Amount',
                'Status',
                'Payment',
                'Transaction ID',
                'Gateway',
                'Date'
            ]);

            foreach ($donationhistory as $d) {
                fputcsv($file, [
                    $d->matricno,
                    $d->service_type,
                    $d->request_method,
                    $d->amount,
                    $d->status,
                    $d->payment,
                    $d->transaction_id,
                    $d->pay_channel,
                    $d->created_at
                ]);
            }

            fclose($file);

        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=donation_history.csv",
        ]);
    }




public function storeNews(Request $request)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image'
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('news_images'),
            $imageName
        );
    }

    News::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'content' => $request->content,
        'image' => $imageName,
        'featured' => $request->featured ? true : false
    ]);

    return back()->with('message', 'News added successfully');
}





public function storeEvent(Request $request)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'event_date' => 'required',
        'venue' => 'required'
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('event_images'),
            $imageName
        );
    }

    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'event_date' => $request->event_date,
        'event_time' => $request->event_time,
        'venue' => $request->venue,
        'image' => $imageName
    ]);

    return back()->with('message', 'Event created successfully');
}


public function news()
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $news = News::latest()->paginate(10);

    return view('admin.news', compact('news'));
}


public function createNews()
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    return view('admin.create-news');
}

public function editNews($id)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $news = News::findOrFail($id);

    return view('admin.edit-news', compact('news'));
}

public function updateNews(Request $request, $id)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $news = News::findOrFail($id);

    $imageName = $news->image;

    if($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('news_images'),
            $imageName
        );
    }

    $news->update([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'content' => $request->content,
        'image' => $imageName,
    ]);

    return redirect()
        ->route('admin.news')
        ->with('message', 'News updated successfully');
}

public function deleteNews($id)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $news = News::findOrFail($id);

    $news->delete();

    return back()->with('message', 'News deleted');
}

public function events()
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $events = Event::latest()->paginate(10);

    return view('admin.events', compact('events'));
}

public function createEvent()
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    return view('admin.create-event');
}

public function editEvent($id)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $event = Event::findOrFail($id);

    return view('admin.edit-event', compact('event'));
}

public function updateEvent(Request $request, $id)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $event = Event::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'event_date' => 'required',
        'venue' => 'required'
    ]);

    $imageName = $event->image;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('event_images'),
            $imageName
        );
    }

    $event->update([
        'title' => $request->title,
        'description' => $request->description,
        'event_date' => $request->event_date,
        'event_time' => $request->event_time,
        'venue' => $request->venue,
        'image' => $imageName
    ]);

    return redirect()
        ->route('admin.events')
        ->with('message', 'Event updated successfully');
}

public function deleteEvent($id)
{
      if (auth()->user()->user_type !== 'admin') {
                 return redirect()->route('home');
        }
    $event = Event::findOrFail($id);

    $event->delete();

    return back()->with('message', 'Event deleted successfully');
}

}
