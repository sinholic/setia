<div class="btn-group">
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu">
        <?php
            $name = Route::currentRouteName();
            $name_split = explode('.', $name);
            $route_edit = $name_split[0].'.edit';
            $route_show = $name_split[0].'.show';
            $route_delete = $name_split[0].'.destroy';
        ?>
        <a href="{{ route($route_show, $items->id) }}" class="dropdown-item">
            <i class="fas fa-eye"></i> Detail
        </a>
        <a href="{{ route($route_edit, $items->id) }}" class="dropdown-item">
            <i class="fas fa-edit"></i> Edit
        </a>
        <!-- <a class="dropdown-item submit-delete-me" href="#"> -->
            {{ Form::open(array('method' => 'DELETE', 'route' => [$route_delete, $items->id], 'class' => 'delete-me dropdown-item', 'accept-charset' => 'UTF-8', 'style' => 'display:inline')) }}
            <!-- <form class="delete-me" method="POST" action="{{ route($route_delete, $items->id) }}" accept-charset="UTF-8" style="display:inline"> -->
                <!-- <input name="_method" value="DELETE" type="hidden"> -->
                <!-- <input name="_token" value="'.csrf_token().'" type="hidden"> -->
                <!-- <i class="fas fa-trash"></i> Delete -->
                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
            <!-- </form> -->
            {{ Form::close() }}
        <!-- </a> -->
    </div>
</div>
