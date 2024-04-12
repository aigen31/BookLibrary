<?php
namespace TestLibrary;

if (!empty($_POST['handler'])) {
	require_once __DIR__ . '/handlers/loader.php';
} else {
	require_once __DIR__ . '/app/layout.php';
}