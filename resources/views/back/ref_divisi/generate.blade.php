<div class="mt-3" style="width:100% !important">
    <ul class="list-group">
        @foreach ($list as $item)
        <li class="list-group-item" data-id="{{$item->id}}" id="list_{{$item->id}}">
            <div class="" style="height: 100%;"></div>
            <div class="">
                <div class="row">
                    <div class="col-10 px-5">
                        <h4><i class="bi bi-list"></i> <span class="ml-2">{{$item->nama}}</span>
                        </h4>
                    </div>
                    <div class="col-10-2" style="z-index: 1">
                        <a href="javascript:void(0)" onclick="editDataFunction({{$item}})">
                            <i class="fa fa-edit text-info">
                            </i>
                        </a>

                        <a href="javascript:void(0)" onclick="deleteData({{$item->id}})">
                            <i class="fa fa-trash text-danger">
                            </i>
                        </a>

                    </div>
                </div>
            </div>
            @if ($item->children)
            <ul class="list-group">
                @foreach ($item->children as $item)
                <li class="list-group-item" data-id="{{$item->id}}" id="list_{{$item->id}}">
                    <div class="" style="height: 100%;"></div>
                    <div class="">
                        <div class="row">
                            <div class="col-10 px-5">
                                <h6><i class="bi bi-list"></i> <span
                                        class="ml-2">{{$item->nama}}</span></h6>
                            </div>
                            <div class="col-2">
                                <a href="javascript:void(0)" onclick="editDataFunction({{$item}})">
                                    <i class="fa fa-edit text-info">
                                    </i>
                                </a>

                                <a href="javascript:void(0)"
                                    onclick="deleteData({{$item->id}})">
                                    <i class="fa fa-trash text-danger">
                                    </i>
                                </a>

                            </div>
                        </div>
                    </div>
                    @if ($item->children)
                    <ul class="list-group">
                        @foreach ($item->children as $item)
                        <li class="list-group-item" data-id="{{$item->id}}"
                            id="list_{{$item->id}}">
                            <div class="" style="height: 100%;"></div>
                            <div class="">
                                <div class="row">
                                    <div class="col-10 px-5">
                                        <h6><i class="bi bi-list"></i> <span
                                                class="ml-2">{{$item->nama}}</span></h6>
                                    </div>
                                    <div class="col-2">
                                        <a href="javascript:void(0)"
                                            onclick="editDataFunction({{$item}})">
                                            <i class="fa fa-edit text-info">
                                            </i>
                                        </a>

                                        <a href="javascript:void(0)"
                                            onclick="deleteData({{$item->id}})">
                                            <i class="fa fa-trash text-danger">
                                            </i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                            @if ($item->children)
                            <ul class="list-group">
                                @foreach ($item->children as $item)
                                <li class="list-group-item" data-id="{{$item->id}}"
                                    id="list_{{$item->id}}">
                                    <div class="" style="height: 100%;"></div>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-10 px-5">
                                                <h6><i class="bi bi-list"></i> <span
                                                        class="ml-2">{{$item->nama}}</span></h6>
                                            </div>
                                            <div class="col-2">
                                                <a href="javascript:void(0)"
                                                    onclick="editDataFunction({{$item}})">
                                                    <i class="fa fa-edit text-info">
                                                    </i>
                                                </a>

                                                <a href="javascript:void(0)"
                                                    onclick="deleteData({{$item->id}})">
                                                    <i class="fa fa-trash text-danger">
                                                    </i>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    @if ($item->children)
                                    <ul class="list-group">
                                        @foreach ($item->children as $item)
                                        <li class="list-group-item" data-id="{{$item->id}}"
                                            id="list_{{$item->id}}">
                                            <div class="" style="height: 100%;"></div>
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-10 px-5">
                                                        <h6><i class="bi bi-list"></i> <span
                                                                class="ml-2">{{$item->nama}}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="javascript:void(0)"
                                                            onclick="editDataFunction({{$item}})">
                                                            <i class="fa fa-edit text-info">
                                                            </i>
                                                        </a>

                                                        <a href="javascript:void(0)"
                                                            onclick="deleteData({{$item->id}})">
                                                            <i class="fa fa-trash text-danger">
                                                            </i>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</div>