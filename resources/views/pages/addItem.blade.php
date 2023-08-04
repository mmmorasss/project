@extends('template')
@section('title', 'Add Productㅤ|ㅤFURN')
@section('content')
    <div class="login-bg">
        <div class="register-form-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="register-form text-center">
                            <div class="register-heading">
                                <span>Add Product</span>
                            </div>
                            <form action="/addItem" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-box">
                                    <div class="single-input-fields">
                                        <label>Product name</label>
                                        <input required name="name" type="text" maxlength=50>
                                    </div>

                                    <div class="row">
                                        <div class="col-7">
                                            <div class="single-input-fields">
                                                <label>Product Cost</label>
                                                <input required name="cost" type="number" min="100" max="1000000" placeholder="max = 100 000">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="single-input-fields">
                                                <label>Product Image</label>
                                                <div class="add_img_b">
                                                    <input required type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="img" class="form-control" style="opacity: 0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-4">
                                            <div class="single-input-fields">
                                                <label for="select">Discount: </label>
                                                <select  name="discount" class="form-select"  aria-label="select">
                                                    <option value="" selected>0%</option>
                                                    <option value="20">20%</option>
                                                    <option value="25">25%</option>
                                                    <option value="50">50%</option>
                                                    <option value="70">70%</option>
                                                    <option value="80">80%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="single-input-fields">
                                                <label for="type">Product Type</label>
                                                <select aria-label="type" class="form-select" name="type">
                                                    <option value="1" selected>Sofa</option>
                                                    <option value="2">Table</option>
                                                    <option value="3">Chair</option>
                                                    <option value="4">Bed</option>
                                                    <option value="5">Lighting</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="single-input-fields">
                                                <label for="ship">Shipping Cost</label>
                                                <select aria-label="ship" class="form-select" name="ship">
                                                    <option value="" selected>Free ship</option>
                                                    <option value="200">200</option>
                                                    <option value="300">300</option>
                                                    <option value="400">400</option>
                                                    <option value="500">500</option>
                                                    <option value="600">600</option>
                                                    <option value="700">700</option>
                                                    <option value="800">800</option>
                                                    <option value="900">900</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="single-input-fields my-3">
                                            <label for="desc">Product Description</label>
                                            <div class="form-floating">
                                                <textarea required maxlength="200" aria-label="disc"  name="description" class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 150px; font-size: 15px"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="Add Product" class="submit-btn3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
