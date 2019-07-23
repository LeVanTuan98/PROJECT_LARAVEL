 @extends('admin.layouts.glance')

@section('title')
    Thêm mới menu-item
@endsection
@section('content')
    <h1> Thêm mới menu-item</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="form-three widget-shadow">
            <form name="menu_item" action="{{url('admin/menu/menuitems')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên menu-item</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control1" id="focusedinput" placeholder="Tên Menu-item">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Kiểu menu-item</label>
                    <div class="col-sm-8">
                        <select id="menu-type" name="type">
                            @foreach($types as $type_id => $type)
                                <option value="{{$type_id}}" data-type="type-{{$type_id}}">{{'-'.$type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="type-1" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Shop category</label>
                    <div class="col-sm-8">
                        <input name="shop_category">
                    </div>
                </div>
                <div id="type-2" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Shop product</label>
                    <div class="col-sm-8">
                        <input name="shop_product">
                    </div>
                </div>
                <div id="type-3" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content category</label>
                    <div class="col-sm-8">
                        <input name="content_category">
                    </div>
                </div>
                <div id="type-4" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content post</label>
                    <div class="col-sm-8">
                        <input name="content_post">
                    </div>
                </div>
                <div id="type-5" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content page</label>
                    <div class="col-sm-8">
                        <input name="content_page">
                    </div>
                </div>
                <div id="type-6" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Content tag</label>
                    <div class="col-sm-8">
                        <input name="content_tag">
                    </div>
                </div>
                <div id="type-7" class="form-group menu-type">
                    <label for="focusedinput" class="col-sm-2 control-label">Custom link</label>
                    <div class="col-sm-8">
                        <input name="custom_link">
                    </div>
                </div>


                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Final Link</label>
                    <div class="col-sm-8">
                        <input type="text" name="link" readonly value="{{old('link')}}" class="form-control1" id="focusedinput" placeholder="Auto fill link">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Icon</label>
                    <div class="col-sm-8">
                        <input type="text" name="icon" value="{{old('icon')}}" class="form-control1" id="focusedinput" placeholder="Icon">
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Parent</label>
                    <div class="col-sm-8">
                        <select name="parent_id">
                            <option value="0">Mặc định</option>
                            @foreach($menuitems as $menuitem)
                                <option value="{{$menuitem['id']}}">{{str_repeat('-',$menuitem['level']).' '.$menuitem['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Menu cha</label>
                    <div class="col-sm-8">
                        <select name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4" class="form-control1 mytinymce">{{old('desc')}}</textarea></div>
                </div>
                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.menu-type').hide();
            var current_type = $('#menu-type').find('option:selected').data('type');
            $('#'+current_type).show()


            $('#menu-type').on('change',function () {
               var value = $(this).val();
               var type = $(this).find('option:selected').data('type');
               $('.menu-type').hide();
               if($('#'+type).length){
                   $('#'+type).show();
               }
            })
        });
    </script>

@endsection

