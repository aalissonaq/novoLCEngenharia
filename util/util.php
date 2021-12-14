<?php

function sweetalert($title, $message, $type, $time, $position = null)
{
  $position = $position ? $position : 'center';
  echo "<script type='text/javascript'>
  Swal.fire({
    icon: '$type',
    title: '$title',
    text: '$message',
    showConfirmButton: false,
    timer: $time,
    position: '$position',
  });
  </script>";
}

function GetDirectorySize($path)
{
  $bytestotal = 0;
  $path = realpath($path);
  if ($path !== false) {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
      $bytestotal += $object->getSize();
    }
  }
  $bytes = $bytestotal;
  $si_prefix = array('B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB');
  $base = 1024;
  $class = min((int)log($bytes, $base), count($si_prefix) - 1);

  return sprintf('%1.2f', $bytes / pow($base, $class)) . ' ' . $si_prefix[$class];
}
function GetDirectoryFreeSize($path, $storage)
{
  $base = 1024;
  $storage = $storage * 1e+9;
  $bytestotal = 0;
  $path = realpath($path);
  if ($path !== false) {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
      $bytestotal += $object->getSize();
    }
  }
  $bytes = $storage - $bytestotal;
  $si_prefix = array('B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB');
  // $base = 1024;
  $class = min((int)log($bytes, $base), count($si_prefix) - 1);

  return sprintf('%1.2f', $bytes / pow($base, $class)) . ' ' . $si_prefix[$class];
}
function GetDirectoryPercentageUsed($path, $storage, $unit = null)
{
  $base = 1024;
  $unit = null ? $unit = 'GB' : $unit = $unit;
  switch ($unit) {
    case 'GB':
      $storage = $storage * 1e+9;
      break;
    case 'MB':
      $storage = $storage * 1e+6;
      break;
    case 'KB':
      $storage = $storage * 1e+3;
      break;
    default:
      $storage = $storage * 1e+9;
      break;
  }
  //$storage = pow($storage * $base, 3);
  $bytestotal = 0;
  $path = realpath($path);
  if ($path !== false) {
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object) {
      $bytestotal += $object->getSize();
    }
  }

  $percentage = ($bytestotal  * 100) / $storage;
  return number_format($percentage, 2, '.', '');
}

function uuidv4($data = null)
{
  // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
  $data = $data ?? random_bytes(16);
  assert(strlen($data) == 16);

  // Set version to 0100
  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
  // Set bits 6-7 to 10
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

  // Output the 36 character UUID.
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
