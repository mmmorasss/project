@extends('template')
@section('title', 'User '.$user->id.'ㅤ|ㅤFURN')
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
                                    <?php if (strlen($user->id) > 3){ ?>
                                    <div class="btn-group mb-4 mx-5" role="group">
                                        <button data-bs-toggle="dropdown" onclick="addNewlines();" aria-expanded="false" style="all: unset">
                                            <i class="fa-solid fa-chevron-down fa-xl"  style="color: #000000;"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li style="font-size: 30px;">
                                                <a class="dropdown-item" id="userId"><?=$user->id?></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <script src="/assets/js/profile.js"></script>

                                <?php }else{ ?>
                                    <a style='font-size: 55px'><?=$user->id?></a>
                                <?php } ?>
                                </li>

                                @if($isSeller or $isAdmin)
                                    <li style="font-size: 40px">Role: {{$role->name}}</li>
                                @endif
                                @if($isSeller)
                                    <li style="font-size: 30px">Company: {{$company->company}}</li>
                                @endif

                            </ul>
                            @if(!$isAdmin)
                            <form action="/deleteUser" method="post" class="mb-5">
                                @csrf
                                <button type="submit" class="b_infBlock"><a class="knopka">Delete Account</a></button>
                            </form>
                            @endif
                        </div>
                        <div class="col-sm">
                            <div class="row" id="inf" style="background-color: #ffe7da;   font-size: 20px;">
                                <div class="col-12" style="padding: 50px 50px 70px;">
                                    <li>Name: {{$user->name}}</li>
                                    <li>Email: {{$user->email}}</li>
                                    <li>Tel:  {{$user->phone}}</li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
@endsection
