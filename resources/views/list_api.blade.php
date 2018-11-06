<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Rambla" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>List API</title>
</head>
<body>
    <div class="block-main-content">
        <div class="container">
            <div class="field-header container">
            <div class="row">
                <div class="views-col views-col-1">Method</div>
                <div class="views-col views-col-2">Url</div>
                <div class="views-col views-col-3">Header</div>
                <div class="views-col views-col-4">Params</div>
                <div class="views-col views-col-5">Json resutl</div>
                <div class="views-col views-col-6">Describe</div>
        </div>
            </div>
            <div class="field-group">
            <div class="row">
                <div class="views-col col-12 field-title"><i class="fas fa-plus-circle"></i>Account</div>
            </div>
            <div class="field-body">    
            <div class="row">
                <div class="views-col views-col-1"><p class="bg-success text-white text-center rounded">POST</p></div>
                <div class="views-col views-col-2"><p>/api/register</p></div>
                <div class="views-col views-col-3"><p>Conten-Type: application/json</p>
                            <p>X-Requested-With: XMLHttpRequest</p></div>
                <div class="views-col views-col-4"><p>fullname</p>
                        <p>permission <span>( giaovien / quanly )</span></p>
                        <p>khuvuc <span>( /api/coso )</span></p>
                        <p>loginID</p>
                        <p>loginPASS</p></div>
                <div class="views-col views-col-5">{
                                "code": "200",
                                "account_id": "QL0148"
                            }</div>
                <div class="views-col views-col-6"></div>
            </div>

            <div class="row">
                <div class="views-col views-col-1"><p class="bg-success text-white text-center rounded">POST</p></div>
                <div class="views-col views-col-2"><p>/api/register_info</p></div>
                <div class="views-col views-col-3"><p>Conten-Type: application/json</p>
                            <p>X-Requested-With: XMLHttpRequest</p></div>
                <div class="views-col views-col-4"><p>account_id ( QL0148 )</p>
                        <p>available</p>
                        <p>hinhanh</p>
                        <p>sdt</p>
                        <p>diachi</p>
                        <p>loaiquanly<span>( /api/loaiql )</span></p>
                        <p>email</p>
                        <p>cmnd</p></div>
                <div class="views-col views-col-5"></div>
                <div class="views-col views-col-6">Nếu là giáo viên không cần nhập field 'loaiquanly'.</div>
     
            </div>
            <div class="row">
                <div class="views-col views-col-1"><p class="bg-success text-white text-center rounded">POST</p></div>
                <div class="views-col views-col-2"><p>/api/login</p></div>
                <div class="views-col views-col-3"></div>
                <div class="views-col views-col-4"><p>loginID</p>
                        <p>loginPASS</p></div>
                <div class="views-col views-col-5">{"code":200, "token": {token} }</div>
                <div class="views-col views-col-6"></div>
     
            </div>

            <div class="row">
                <div class="views-col views-col-1"><p class="bg-info text-white text-center rounded">GET</p></div>
                <div class="views-col views-col-2"><p>/api/account</p></div>
                <div class="views-col views-col-3"><p>Authorization: Bearer {token}</p></div>
                <div class="views-col views-col-4"></div>
                <div class="views-col views-col-5"></div>
                <div class="views-col views-col-6"></div>
     
            </div>

            <div class="row">
                <div class="views-col views-col-1"><p class="bg-success text-white text-center rounded">POST</p></div>
                <div class="views-col views-col-2"><p>/api/change_pass</p></div>
                <div class="views-col views-col-3"><p>Authorization: Bearer {token}</p></div>
                <div class="views-col views-col-4"><p>pass_old</p>
                        <p>pass_new</p>
                        <p>pass_confirm</p></div>
                <div class="views-col views-col-5"></div>
                <div class="views-col views-col-6"></div>
     
            </div>

            <div class="row">
                <div class="views-col views-col-1"><p class="bg-info text-white text-center rounded">GET</p></div>
                <div class="views-col views-col-2"><p>/api/logout</p></div>
                <div class="views-col views-col-3"><p>Authorization: Bearer {token}</p></div>
                <div class="views-col views-col-4"></div>
                <div class="views-col views-col-5"></div>
                <div class="views-col views-col-6"></div>
     
            </div>
            </div>
            </div>
        </div>
    </div>
  
       
   </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</html>
