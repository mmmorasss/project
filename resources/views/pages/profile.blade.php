@extends('template')
@section('title', 'Profileㅤ|ㅤFURN')
@section('content')

@auth
    <div class="profile-bg">
        <div class="section-padding40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-5" style="background-color: #ffffff; margin-right: 100px; padding: 50px;">
                        <ul class="list mb-5">
                            <li>
                                <a style="font-size: 55px">Profile ID:</a>
                                @if (strlen($user->id) > 3)
                                <div class="btn-group mb-4 mx-5" role="group" >
                                    <button data-bs-toggle="dropdown" onclick="addNewlines();" aria-expanded="false" style="all: unset">
                                        <i class="fa-solid fa-chevron-down fa-xl"  style="color: #000000;"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li style="font-size: 30px;">
                                            <a class="dropdown-item" id="userId">{{$user->id}}</a>
                                        </li>
                                    </ul>
                                </div>

                                @else
                                    <a style='font-size: 55px'>{{$user->id}}</a>
                                @endif
                            </li>

                            @if($isSeller or $isAdmin)
                                <li style="font-size: 40px">Role: {{$role->name}}</li>
                            @endif
                            @if($isSeller)
                                <li style="font-size: 30px">Company: {{$company->company}}</li>
                            @endif

                        </ul>
                        <form action="/deleteUser" method="post">
                            @csrf
                            <button type="submit" class="b_infBlock"><a class="knopka">Delete Account</a></button>
                        </form>
                    </div>
                    <div class="col-sm">
                        <div class="row" id="inf" style="background-color: #ffe7da;   font-size: 20px;">
                            <div class="col-2" style="background-color: #e18056">
                                <button class="b_infBlock" style="padding: 35%" onclick="changeInf()"><i class="fa-solid fa-pen" style="color: #000000;"></i></button>
                            </div>
                            <div class="col-10" style="padding: 30px 30px 70px;">
                                <li>Name: {{$user->name}}</li>
                                <li>Email: {{$user->email}}</li>
                                <li>Tel:  {{$user->phone}}</li>
                            </div>
                        </div>
                        <div class="row" style=" padding-top: 20px;">
                            @if($isSeller)
                            <div style="background: #fdc2a6; padding: 50px; ">
                                <a href="/addItem" class="knopka">Add Item</a>
                                <a href="/sellerItems/{{$user->id}}" class="knopka">Show my Items</a>
                            </div>
                            @endif
                            @if($isAdmin)
                            <div style="background: #fdc2a6; padding: 50px; ">
                                <a href="/dashboard" class="knopka">Orders</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <script>
        function changeInf() {
        let infBlock = document.getElementById('inf');
        infBlock.innerHTML = `
        <div class="col-2" style="background-color: #e18056">
            <button class="b_infBlock" onclick="xmark()" style="padding: 35%; padding-bottom: 0; padding-top: 30%;">
                <i class="fa-solid fa-xmark fa-xl" style="color: #000000;"></i>
            </button>
            <button class="b_infBlock" onclick="delInput()" style="padding: 35%; padding-bottom: 0;">
                <i class="fa-solid fa-trash" style="color: #000000;"></i>
            </button>
        <form onsubmit="changeProfileInf(); return false;">
            @csrf
            <button class="b_infBlock" style="padding: 35%; padding-bottom: 0;" type="submit">
                <i class="fa-solid fa-check fa-xl" style="color: #000000;"></i>
            </button>
        </div>
            <div class="col-10" style="padding: 30px 30px 40px;">
                <li>Name: <input  required class="type-3" type="text" id="name" value="{{$user->name}}"></li>
                <li>Email: <input required class="type-3" type="email" id="email" value="{{$user->email}}"></li>
                <li>Tel: <input required class="type-3" type="tel" id="phone" value="{{$user->phone}}"></li>
                <li>Password: <input required class="type-3" type="password" id="pass"></li>
            </div>
        </form>
        `;
    }
        function changeProfileInf(){
            let csrf = document.getElementsByName('_token')[0].value;
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let pass = document.getElementById('pass').value;
            let formData = new FormData();
            formData.append("_token", csrf);
            formData.append("name", name);
            formData.append("email", email);
            formData.append("phone", phone);
            formData.append("pass", pass);
            fetch('/changeInf', {
                method: "POST",
                body: formData
            }).then(response => response.json())
                .then(result => {
                        let r = result.res;
                        if (r === 'success'){
                            location.reload();
                        }else if(r === 'fail'){
                            alert("Incorrect password. Check the correctness of the entered data");
                        }else if(r === 'exist'){
                            alert("This mail is already in use. Try another one");
                        }else if(r === 'phone'){
                            alert("This phone number is already in use. Try another one");
                        }

                });
    }
        function delInput(){
            document.getElementById('name').value = "";
            document.getElementById('email').value = "";
            document.getElementById('phone').value = "";
            document.getElementById('pass').value = "";
        }
        function xmark(){
            let infBlock = document.getElementById('inf');
            infBlock.innerHTML = `
            <div class="col-2" style="background-color: #e18056">
                <button class="b_infBlock" style="padding: 35%" onclick="changeInf()">
                    <i class="fa-solid fa-pen" style="color: #000000;"></i>
                </button>
            </div>
            <div class="col-10" style="padding: 30px 30px 70px;">
                <li>Name: {{$user->name}}</li>
                <li>Email: {{$user->email}}</li>
                <li>Tel: {{$user->phone}}</li>
            </div>`
        }
    </script>
@endsection
