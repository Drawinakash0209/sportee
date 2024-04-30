
<div>
<div class="mt-12 antialiased mx-auto max-w-screen-sm">
    <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>

    @forelse($indoors->comments as $comment)

        <blockquote class="relative w-full bg-white p-5 border border-gray-200 break-inside-avoid-column m-10">
            <h2 class="text-sm">“{{($comment->comment)}}“</h2>
            <div class="mt-5 flex items-start gap-4">
                <img src="https://www.svgrepo.com/show/491978/gas-costs.svg" class="w-10 h-10 object-cover object-center" alt="Aaron Francis">
                <div class="text-xs">
                    <cite class="not-italic">Aaron Francis</cite>
                    <p class="text-gray-700">Creator of <a href="" target="_blank" class="text-red-500">XYZ</a></p>
                </div>
            </div>
        </blockquote>

    @empty
        <p class="text-gray-500">No comments yet! Be the first to comment</p>

    @endforelse
    <div class="space-y-4">
    </div>
</div>

<div class="flex mx-auto items-center justify-center shadow-lg mt-16 mx-8 mb-4 max-w-lg">
    <form action="{{url('comments')}}" method="post" class="w-full max-w-xl bg-white rounded-lg px-4 pt-2">
        @csrf

        @if(session('message'))
            <h4 class="alert-danger">{{session('message')}}</h4>
        @endif
        <input type="hidden" name="post_id" value="{{$indoors->id}}">
        <div class="flex flex-wrap -mx-3 mb-6">
            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
            <div class="w-full md:w-full px-3 mb-2 mt-2">
                <textarea name="comments" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
            </div>
            <div class="w-full md:w-full flex items-start md:w-full px-3">
                <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                    <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs md:text-sm pt-px">Some HTML is okay.</p>
                </div>
                <div class="-mr-1">
                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Post Comment'>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

