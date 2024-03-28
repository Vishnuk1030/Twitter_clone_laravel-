<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="text-center">Search</h5>
    </div>
    <div class="card-body text-center">
        <form action="{{ route('dashboard') }}" method="get">
            <input value="{{request('search','')}}" name="search" placeholder="..." class="form-control w-100" type="text">
            <button class="btn btn-dark mt-2 rounded"> Search</button>
        </form>
    </div>
</div>
