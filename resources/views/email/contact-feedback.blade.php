<div style="width:100%; font-family:Verdana, Geneva, sans-serif;
				font-size:14px; color:#06A3DA; background-color:#fff; border:1px solid #ddd; text-align:justify;">
	<div style="color:#06A3DA; line-height:2em; font-size:14px; text-align:justify;">
	    <table width="100%">
			<tr>
				<td><img src="{{asset('https://www.unimed.edu.ng/images/unimedlogo.jpg')}}" /></td><td align="right" valign="bottom" style="font-weight:bold;">Web Feedback</td>
			</tr>
			<tr >
				<td colspan="2" style="height:3px; background-color:#06A3DA;"></td>
			</tr>
			<tr>
				<td colspan="2" style="line-height:2em;">
		    		<strong>Name.:</strong>  {{$enquiry['name']}}<br />
					<strong>Phone No.:</strong> {{$enquiry['mobile']}}<br />
					<strong>Email.:</strong> {{$enquiry['email']}}<br />
					<strong>Message.:</strong><br />
                    {{$enquiry['message']}}
					<br />
				</td>
			</tr>
			<tr >
				<td colspan="2" style="height:20px; background-color:#06A3DA;"></td>
			</tr>
		</table>
	</div>
</div>