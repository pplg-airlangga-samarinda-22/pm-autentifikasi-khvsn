<?php
include('config/koneksi.php');

$currentFile = basename($_SERVER['PHP_SELF'], ".php");

switch ($currentFile) {
  case 'dashboard':
    $title = "Dashboard &mdash; PFSOFT";
    break;
  case 'client-tampilan':
  case 'client':
  case 'edit-client':
    $title = "Client &mdash; PFSOFT";
    break;
  case 'versi':
  case 'edit-versi':
    $title = "Versi &mdash; PFSOFT";
    break;
  case 'master-tampilan':
  case 'master-input':
  case 'edit-tampilan':
    $title = "Custom &mdash; PFSOFT";
    break;
  case 'support-tampilan':
  case 'support':
  case 'edit-support':
    $title = "Support &mdash; PFSOFT";
    break;
  case 'update-tampilan':
  case 'update':
  case 'edit-update':
    $title = "Update Program &mdash; PFSOFT";
    break;
  case 'penambahan-tampilan':
  case 'penambahan':
  case 'edit-penambahan':
    $title = "Penambahan &mdash; PFSOFT";
    break;
  case 'form-custom':
  case 'invoice':
  case 'invoice-show':
  case 'edit-form-custom';
    $title = "Form Custom &mdash; PFSOFT";
    break;
  case 'closing';
    $title = "Closing &mdash; PFSOFT";
    break;
  case 'pengingat';
    $title = "Pengingat &mdash; PFSOFT";
    break;
  default:
    $title = "PFSOFT";
    break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="icon" href="img/logo/logo_pfsoft.png" type="image/x-icon" />
  <title><?php echo $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome-free/css/all.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/components.css">

  <!-- CSS Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

</head>

</html>