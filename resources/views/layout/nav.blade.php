<div class="py-5 flex justify-between items-center bg-blue-500 text-white font-bold px-8 w-full">
    <h1 class="text-3xl">Healthcare Reminder System</h1>
    <img src="{{ asset('img/menu.png') }}" onmouseover="mouse()" class="w-7 h-auto block" alt="">
</div>
<div id="hov" onmouseout="mouseO()" onmouseover="mouseOn()" class="fixed top-16 hidden right-6 w-52 pt-4 px-4 bg-white rounded-md shadow-md">
    <a href="/change/password" class="flex gap-x-2 py-3 border-b-2 border-b-gray-100 items-center hover:bg-blue-100 text-gray-400 px-2"><i class="fa fa-lock text-blue-500"></i>Change password</a>
    <form action="/logout" method="post">
    @csrf
    <button class="flex w-full gap-x-2 py-3 items-center hover:bg-blue-100 text-gray-400 px-2"><i class="fa fa-sign-out-alt text-blue-500"></i>Logout</button>
    </form>
</div>
<script>
    function mouse(){
        document.getElementById('hov').classList.remove('hidden');
    }
    function mouseOn(){
        document.getElementById('hov').classList.remove('hidden');
    }
    function mouseO(){
        document.getElementById('hov').classList.add('hidden');
    }
</script>