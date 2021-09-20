@extends('admin/layout')
@section('content_ad')
    <div id="app" v-cloak>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="container-fluid">
            <template v-for="alert in alerts">
                <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="alert">
                    @{{ alert }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </template>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Products</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload" v-on:click="reload()"><i class="ft-rotate-cw"></i></a>
                                    </li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                <button id="add_button" data-bs-toggle="modal" data-bs-target="#newModal" type="button"
                                    class="btn btn-primary btn-min-width mr-1 mb-1">Add Product</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Color</th>
                                            <th scope="col">Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($products as $item) --}}
                                        <tr v-for="(item , index) in items">
                                            <th scope="row"> @{{ item . id }}</th>
                                            <td> @{{ item . name }}</td>
                                            <td><img v-bind:src=" item.gallery" width="100" height="70"
                                                    v-bind:alt="item.name"></td>
                                            <td> @{{ item . category }}</td>
                                            <td> @{{ item . color }}</td>
                                            <td><button type="button" class="btn btn-warning btn-min-width mr-1 mb-1"
                                                    v-on:click="editItem(item)">Edit</button>
                                                <button type="button" class="btn btn-danger btn-min-width mr-1 mb-1"
                                                    v-on:click="deleteItem(item)">Delete</button>
                                            </td>

                                        </tr>
                                        {{-- @endforeach --}}


                                    </tbody>
                                </table>
                                <div class="text-center" v-if="pageList.length > 1">
                                    <button class="btn  ml-1" v-for="page in pageList" v-bind:class="page == current_page ? 'btn-dark' : 'btn-info'" v-on:click="getList(page)">@{{page}}</button>
                                </div>
                            </div>
                        </div>

                        <!--New Modal -->
                        <div class="modal fade" id="newModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">New Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="add_form"
                                            data-action="{{ url('/admin/products/create') }}">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="ho_add" class="col-form-label">Product Name</label>
                                                    <input type="text" name="prd_name" class="form-control" id="ho_add">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_name"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="ten_add" class="col-form-label">Price</label>
                                                    <input type="text" name="prd_price" class="form-control"
                                                        id="prd_price">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_price"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Category</label>
                                                    <input type="text" name="prd_cate" class="form-control" id="prd_cate">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Color</label>
                                                    <input type="text" name="prd_color" class="form-control"
                                                        id="prd_color">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_color"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Gallery</label>
                                                    <input type="text" name="prd_gallery" class="form-control"
                                                        id="prd_gallery">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Description</label>
                                                    <input type="text" name="prd_desc" class="form-control" id="prd_desc">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_desc"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" v-on:click="submitItem()"
                                            id="add_prd">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End New Modal -->

                        <!-- Edit modal -->
                        <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" v-if="item">
                                        <form method="POST" id="edit_form"
                                            data-action="{{ url('/admin/products/update') }}">
                                            <input type="hidden" name="id" v-model="item.id">
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="ho_add" class="col-form-label">Product Name</label>
                                                    <input type="text" name="prd_name" v-model="item.name"
                                                        class="form-control" id="ho_add">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_name"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="ten_add" class="col-form-label">Price</label>
                                                    <input type="text" name="prd_price" class="form-control"
                                                        id="prd_price" v-model="item.price">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_price"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Category</label>
                                                    <input type="text" v-model="item.category" name="prd_cate"
                                                        class="form-control" id="prd_cate">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Color</label>
                                                    <input type="text" v-model="item.color" name="prd_color"
                                                        class="form-control" id="prd_color">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_color"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Gallery</label>
                                                    <input type="text" v-model="item.gallery" name="prd_gallery"
                                                        class="form-control" id="prd_gallery">
                                                    <span class="text-danger"></span>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="sdt_add" class="col-form-label">Description</label>
                                                    <input type="text" v-model="item.description" name="prd_desc"
                                                        class="form-control" id="prd_desc">
                                                    <template v-if="new_response.error">
                                                        <span v-for="errName in new_response.error.prd_desc"
                                                            class="text-danger">@{{ errName }}</span>
                                                    </template>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" v-on:click="submitEdit()"
                                            id="edit_prd">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Edit modal -->
                        <!-- Delete Modal -->

                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <form method="POST" id="deleteForm" data-action="{{ url('/admin/products/delete') }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" v-if="item">
                                            {{-- <template v-if="form.field == 'username'">
                                        <span>Bạn chắc chắn muốn xóa <b>"{{item.username}}"</b>???</span>
                                    </template> --}}
                                            <template v-if="item.name">
                                                <span>Bạn chắc chắn muốn xóa <b>"@{{ item . name }}"</b>???</span>
                                            </template>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" v-on:click="submitDelete()"
                                                class="btn btn-primary">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Delete Modal -->
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        var app = new Vue({
            el: '#app',
            data: {
                items: [],
                item: {},
                pageList: [],
                limit: 6,
                current_page: 1,
                new_response: '',
                alerts: [],

                // delete_status: 0,

            },
            methods: {
                reload: function() {
                    this.getList();
                },
                editItem(obj) {
                    // console.log();
                    this.item = obj;
                    // this.formAttr.forEach(function(item) {
                    //     if (item.type == 'ckedit') {
                    //         CKEDITOR.instances['ckeditor-edit'].setData(obj.noidung);
                    //     }
                    // });
                    $('#editModal').modal('toggle');
                },
                getList: function(page = false) {

                    var that = this;
                    // $.noConflict();
                    // that.filter_init.forEach(function(item) {
                    //     that.filter[item.field] = item.value;
                    // });
                    if (page) {
                        that.current_page = page;
                    }
                    // that.filter['page'] = that.current_page;
                    // that.filter['limit'] = that.limit;
                    // that.filter['delete_status'] = that.delete_status;
                    $.get("{{ url('/admin/products/list') }}", {
                        page: that.current_page,
                        limit: that.limit,
                        // delete_status: that.delete_status,
                        // ten: that.ten,
                        // trangthai: that.trangthai,

                    }, function(res) {
                        that.items = res.data;
                        console.log("list data");
                        console.log(res.data);
                        var page_number = Math.ceil(res.total / that.limit);
                        console.log(res.total);
                        console.log(that.limit);
                        console.log(page_number);
                        // that.totalRec = res.total;
                        // console.log( that.totalRec);
                        that.pageList = [];
                        for (var i = 1; i <= page_number; i++) {
                            that.pageList.push(i);
                        }
                        console.log(that.pageList.length);
                    });
                },
                // addItem() {
                //     $('#newModal').modal();
                //     console.log($('#newModal'));
                //     console.log("click");
                // },
                deleteItem(obj) {
                    this.item = obj;
                    $('#deleteModal').modal('toggle');
                },
                submitDelete() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    var that = this;
                    var action = $('#deleteForm').attr('data-action');
                    $.post(action, this.item, function(response) {

                        if (response.code === 200) {
                            that.alerts.push(response.message);
                            $('#deleteModal').modal('hide');
                            that.getList();
                        }
                    });
                },
                submitItem() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    let form = document.getElementById('add_form');
                    var data = new FormData(form);
                    var that = this;
                    var action = $('#add_form').attr('data-action');
                    // this.formAttr.forEach(function(item) {
                    //     if (item.type == 'ckedit') {
                    //         var contentAdd = CKEDITOR.instances['ckeditor-create'].getData();
                    //         data.set('mota', contentAdd);
                    //     }
                    // });
                    $.ajax({
                            processData: false,
                            contentType: false,
                            method: "POST",
                            url: action,
                            data: data
                        })
                        .done(function(response) {
                            if (response.code === 200) {
                                that.new_response = '';
                                that.alerts.push(response.message);
                                that.getList();
                                $('#newModal').modal('hide');
                                $('#add_form')[0].reset();
                                $('#newModal').button('reset');
                                // $('#image_profile').hide();
                                // CKEDITOR.instances['ckeditor-create'].setData('');
                            } else {
                                that.new_response = response;
                                console.log(that.new_response.error);
                                console.log(that.new_response.error.prd_name);
                            }
                        });
                },
                submitEdit() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    let form = document.getElementById('edit_form');
                    var data = new FormData(form);
                    var that = this;
                    var action = $('#edit_form').attr('data-action');
                    // this.formAttr.forEach(function(item) {
                    //     if (item.type == 'ckedit') {
                    //         var contentAdd = CKEDITOR.instances['ckeditor-create'].getData();
                    //         data.set('mota', contentAdd);
                    //     }
                    // });
                    $.ajax({
                            processData: false,
                            contentType: false,
                            method: "POST",
                            url: action,
                            data: data
                        })
                        .done(function(response) {
                            if (response.code === 200) {
                                that.new_response = '';
                                that.alerts.push(response.message);
                                that.getList();
                                $('#editModal').modal('hide');
                                // $('#edit_form')[0].reset();
                                // $('#editModal').button('reset');
                                // $('#image_profile').hide();
                                // CKEDITOR.instances['ckeditor-create'].setData('');
                            } else {
                                that.new_response = response;
                                console.log(that.new_response.error);
                                console.log(that.new_response.error.prd_name);
                            }
                        });
                },
            }
        });

        app.getList(1);
    </script>

























    {{-- <script>
        
        $(document).ready(function(){
            
            var that = this;
            console.log("ok");
            // click button theo ID
            // $('#add_button').click(function() {
            //     $('add_form')[0].reset();

            // });

            // var dataTable = $('#bangnhanvien').DataTable({
            //     "processing": true,
            //     "serverSide": true,
            //     "order": [],
            //     "ajax": {
            //         url: "model/nhanvien/fetch.php",
            //         type: "POST"
            //     },
            //     "columnDefs": [{
            //         "targets": [8, 9],
            //         "orderable": false,
            //     }, ],

            // });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $("#add_prd").click(function() {
                submitNew();
            });

            function submitNew() {
                let form = document.getElementById('add_form');
                var data = new FormData(form);
                // var ho_add = $('#ho_add').val();
                // var ten_add = $('#ten_add').val();
                var action = $('#add_form').attr('data-action');
                // if (ho_add != '' && ten_add != '' && sdt_add != '' && diachi_add != '' && dateStart_add != '' && dateEnd_add != '' && birthday_add != '') {
                $.ajax({
                        processData: false,
                        contentType: false,
                        method: "POST",
                        url: action,
                        data: data
                    })
                    .done(function(response) {
                        if (response.code === 200) {
                            that.new_response = response.message;
                            console.log(that.new_response);
                            // let alerts = [];
                            // this.alerts.push(1);
                            $('#newModal').removeClass('show');
                            // $('#newModal').addClass('hide');
                            // $('#newForm')[0].reset();
                            // $('#newModal').button('reset');
                            // $('#image_profile').hide();
                            // CKEDITOR.instances['ckeditor-create'].setData('');
                        } else {
                            that.new_response = response;
                        }
                    });
            };


        });
    </script> --}}
@endsection
