<div>
    <form action="" class="form-control">
        <input type="text" class="form-control" wire:keyup="search($event.target.value)" name="ffff" placeholder="User qidirish ....">
    </form>

    @isset($result)

    @if ( count($result) > 0)

    <div class="table-responsive">
        <table class="table">
        <caption>List of users</caption>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">ID_CODE</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
            <tr>
                <th>{{$item->id}}</th>
                <th>{{$item->name}}</th>
                <th>{{$item->surname}}</th>
                <th>{{$item->email}}</th>
                <th>{{$item->phone}}</th>
                <th>{{$item->id_code}}</th>
              </tr>
            @endforeach
        </tbody>
      </table>
      </div>
      @endif

    @endisset

</div>
