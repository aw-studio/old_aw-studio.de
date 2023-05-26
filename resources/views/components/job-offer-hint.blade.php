@if($job_offers->count() > 0)
<div>
<a 
class="block bg-gradient-to-r from-[#F15220] to-[#F2C23C] !text-white font-semibold rounded-full animate-pulse transition-all hover:scale-105 duration-300 hover:animate-none px-4 py-1 hover:drop-shadow-2xl" 
href="/{{ App::getLocale() }}/jobs/{{ $job_offers[0]->slug }}">
   {{ __('app.job-offer')}}
</a>
</div>
@endif