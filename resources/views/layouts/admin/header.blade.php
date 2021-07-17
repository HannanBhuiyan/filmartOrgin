

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href=" {{ asset('backend') }}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href=" {{ asset('backend') }}/dist/css/toastr.min.css">
    <link rel="stylesheet" href=" {{ asset('backend') }}/dist/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href=" {{ asset('backend') }}/dist/css/jquery.dataTables.css">
    <style>
        .imgoverlay{
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background: #0a0e149c;
            opacity:0;
            transition:all .2s ease-in-out;
        }

        .multi_img {
            position: relative;

        }
        .multi_img:hover, .imgoverlay:hover {
            opacity:1;
        }
        .multi_img:hover, .multi_img_icon:hover {
            opacity:1;
            background: #0a0e149c;
        }

        .multi_img_icon {
            position: absolute;
            z-index: 111;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            top: 50%;
            left: 50%;
            opacity:0;
            transition:all .2s ease-in-out;

        }
        .multi_img_icon a i {
            color: red;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 26px;

        }



        img.thumb {
            margin: 12px;
        }
        .profile_section {
            margin:100px 0px;
        }
        .user-profile-image {
            width:200px;
            height:200px;
            border-radius:50%;
            margin: auto;
            position:relative;
        }
        .profile-inner {
            border: 1px solid #ddd;
            padding:50px 0px;
        }
        .user-profile-image img {
            width:200px;
            height:200px;
            border-radius:50%;

        }
        .profile_file {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            color:transparent;
            box-sizing:border-box;
            background:black;
            border-radius: 50%;
            opacity:0;
            transition: all .3s ease-in-out;
        }
        .profile_file:hover {
            opacity:1;
        }
        .profile_file::-webkit-file-upload-button{
            visibility:hidden;
        }
        .profile_file::before {
            content: '\f083';
            font-family:FontAwesome;
            font-size: 50px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50% , -50%);
        }
        input[type=file] {
            display: block;
            outline:none !important;
        }
        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #00000040;
            border-radius: 50%;
        }
        .profile_name {
            padding: 32px 0px 20px 0px;
            border-bottom: 1px solid #ddd;
        }
        .nameEdit i {
            color: #0c84ff;
            font-weight:900;
        }
        .profile_item {
            padding: 20px 0px 20px 0px;
        }
        .profile_email {
            padding: 12px 0px 20px 0px;
            border-bottom: 1px solid #ddd;
        }
        .nameLabel, .emailLabel {
            font-size:16px;
            font-weight:700;
        }

        /* profile email css */
        .profileInput {
            font-size: 16px;
            outline:none;
            border:none;
            background:transparent;
            margin-top: 10px;
        }
        .profileNameEdit, .profileEmailEdit {
            border: 1px solid #59b210;
            outline:none !important;
            width: 100%;
            padding:12px 30px;
        }

        .nameUpdateBtnGroup {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 15px 30px;
        }
        .nameUpdateCancelBtn {
            color: #000;
            padding: 10px 25px;
            font-weight: 700;
            font-size: 17px;
            border-radius: 5px;
            background-color:#ddd;
            border: 1px solid #ddd;
        }
        .nameUpdateCancelBtn:hover {
            background: #59b210;
            color: #fff;
            border: 1px solid #ddd;
        }
        .nameUpdateBtn {
            background: #59b210;
            border: none;
            color: #fff;
            padding: 10px 25px;
            font-weight: 700;
            font-size: 17px;
            border-radius: 5px;
        }
    </style>


</head>





