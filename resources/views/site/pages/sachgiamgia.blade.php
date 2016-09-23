@extends('site.master')
@section('title')
--- Sách Giảm Giá
@endsection
@section('css')
<link href="{{asset('public/site/css/jquery-ui.css')}}" rel="stylesheet">
<style type="text/css">
	.mega-menu-category{
		display: none;
	}
    .sach_moi:hover{
        opacity: 0.6;
    }
</style>
@endsection
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="container" >
                <ul class="breadcrumb" style="font-size:16px;">
                    <li><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                    <li class="active">Kho sách giảm giá</li>

                </ul>
            </div>
</div>
@endsection
@section('content')
<div class="main">
            <div class="container">
                <div class="row">
                <!-- ============CÁC MỤC BÊN TRÁI ================-->
                    <div class="col-sm-3 col-left">
                         <!-- SORT BY -->
                        <div class="block block-layered-nav">
                             <!--=============DANH MỤC=============-->
                              @include('site.blocks.danhmuc')
                              <!--=============DANH MỤC=============-->
                        </div>
                        <!-- /SORT BY -->
                        <!-- COMPARE -->
                        <div class="block block-list">
                            <div class="block-title">
                                <strong><span>Compare</span></strong>
                            </div>
                            <div class="block-content">
                                <p class="empty">You have no items to compare.</p>
                            </div>
                        </div>
                        <!-- /.COMPARE -->
                        <!-- IN RA SẢN PHẨM GIẢM GIÁ-->
                        <div class="banner-left"><a href="#"><img src="{{asset('public/site/images/ads/ads-01.jpg')}}" alt=""></a>
                            <div class="banner-content">
                                <h1>sale up to</h1>
                                <h2>20% off</h2>
                                <p>on selected products</p>
                                <a href="#">buy now</a>
                            </div>
                        </div>
                        <!-- IN RA SẢN PHẨM GIẢM GIÁ -->
                        
                    </div><!-- /.col-left -->
                <!-- ============CÁC MỤC BÊN TRÁI ================-->
                    <div class="col-sm-9 col-right">
                        <div class="page-title">
                            <h1>Kho Sách Giảm Giá</h1>
                        </div>
                        <div class="toolbar">
                            <div class="sorter">
                                <p class="view-mode">
                                    <label>View as:</label>
                                    <strong class="grid" title="Grid">Grid</strong>&nbsp;
                                    <a class="list" title="List" href="#">List</a>&nbsp;
                                </p>
                            </div><!-- /.sorter -->
                            <div class="pager">
                                <div class="sort-by hidden-xs">
                                    <label>Sort By:</label>
                                    <select class="form-control input-sm">
                                        <option selected="selected">Position</option>
                                        <option>Name</option>
                                        <option>Price</option>
                                    </select>
                                    <a title="Set Descending Direction" href="#"><span class="fa fa-sort-amount-desc"></span></a>
                                </div>
                                <div class="limiter hidden-xs">
                                    <label>Trang:</label>
                                    <div class="limiter-inner">
                                        <select id="select_paginate" class="form-control input-sm">
                                           @for($page=1;$page<=$sachgiamgia->lastPage();$page++)
                                            <option src="#" @if($sachgiamgia->currentPage()==$page) selected="selected" @endif>
                                                    {{$page}}
                                            </option>
                                           @endfor
                                        </select> 
                                    </div>
                                </div>
                            </div><!--- /.pager -->
                        </div><!-- /.toolbar -->
                        <!-- SẢN PHẨM CỦA CHÚNG TA -->
                      
                        <div class="row products" id="spmoi">
                          @foreach($sachgiamgia as $key=>$sach)
                            <div class="col-md-3 col-sm-6">
                                <div class='productslider-item item'>
                                    <div class="item-inner">
                                        <div class="images-container">
                                           
                                            <div class="product_icon">
                                                <div class='sale-icon'><span>-{{round(($sach->price-$sach->sale_price)*100/($sach->price))}}%</span></div>
                                            </div>
                                          
                                            <a href="{{route('chitietsach',$sach->slug)}}.html" title="{{$sach->title}}" class="product-image">
                                                <img class="sach_moi" width="100" height="250" src="{{asset('resources/upload/book/'.$sach->image)}}" alt="{{asset('resources/upload/book/'.$sach->image)}}" />
                                            </a>
                                            <div class="box-hover">
                                                <ul class="add-to-links">
                                                    <li><a href="#" class="link-quickview">Quick View</a></li>
                                                    <li><a href="#" class="link-wishlist">Add to Wishlist</a></li>
                                                    <li><a href="#" class="link-compare">Add to Compare</a></li>
                                                    <li><a href="javascript:void(0)" class="link-cart yourcart" data-id="{{$sach->id}}" title="{{$sach->slug}}">Add to Cart</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="des-container">
                                            <h2 class="product-name"><a href="{{route('chitietsach',$sach->slug)}}.html" title="{{$sach->title}}">

                                                @if(strlen($sach->title)>28)

                                                        {!! substr($sach->title,0,28) !!}...
                                                    @else
                                                        {{$sach->title}}
                                                    @endif
                                            </a></h2>
                                            <div class="price-box" style="text-align:center">
                                                <p class="special-price">
                                                    <span class="price-label">Special Price</span>
                                                    <span class="price">{!! number_format($sach->sale_price,0,",",".") !!}.đ</span>
                                                </p>
                                                @if($sach->sale_price < $sach->price)
                                                    <p class="old-price">
                                                        <span class="price-label">Regular Price: </span>
                                                        <span class="price">{{number_format($sach->price,0,",",",")}}.đ</span>
                                                    </p>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach
                        </div>
                       
                        <!-- SẢN PHẨM CỦA CHÚNG TA -->
                        
                    </div><!-- /.col-right -->
                </div>
            </div>
</div><!-- /.main -->
@endsection
@section('javascript')
<script type="text/javascript">
            $(document).ready(function(){
               //=========================XỬ LÝ PHÂN TRANG==============
                $("#select_paginate").change(function(){
                       // alert($( "#select_paginate option:selected" ).val());
                        //alert("ok");
                    var url="sach-giam-gia";  // luc nay url se la : http://localhost:8080/laravel-sach/sach-moi
                    var sotrang=parseInt($( "#select_paginate option:selected" ).val());
                    $("#spmoi").load(url+"?page="+sotrang+" #spmoi"); // nghĩa là ta chỉ load lại nội dung các sản phẩm ở trang số đó thôi ko load hết cả trang
                  });
            });
</script>
@endsection