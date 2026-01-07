<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <form wire:submit.prevent="send">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="form-singel" style="padding-top: 0px !important;">
                    <textarea wire:model="chat" name="chat" placeholder="Message"></textarea>
                </div>
            </div>
            <div class="col-lg-12" style="text-align: right;">
                <div class="form-singel" style="padding-top: 0px !important;">
                    <button type="submit" id="sendChat" class="main-btn">Send Message</button>
                </div>
            </div>
        </div> <!-- row -->
    </form>
</div>
