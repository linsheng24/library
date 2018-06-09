<?php

$route = new Router(Request::uri()); 

switch($route->getParameter(1)){
    case "logout":
      include('php/login/logout.php');
    break;

    case "regist":
      include('php/login/regist.php');
    break;

    case "book":
      include('page/book.php');
    break;

    case "find":
      include('page/find.php');
    break;

    case "menu":
      include('page/menu.php');
    break;

    case "overdue":
      include('page/overdue.php');
    break;

    case "state":
      include('page/state.php');
    break;

    case "login":
      include('php/login/login.php');
    break;

    case "addBook":
      include('php/addBook.php');
    break;

    case "bookLoan":
      include('php/bookLoan.php');
    break;

    case "branchLoan":
      include('php/branchLoan.php');
    break;

    case "cardLoan":
      include('php/cardLoan.php');
    break;

    case "delBook":
      include('php/delBook.php');
    break;

    case "findBook":
      include('php/findBook.php');
    break;

    case "moveBook":
      include('php/moveBook.php');
    break;

    case "overBook":
    include('php/overBook.php');
    break;

    case "overUser":
      include('php/overUser.php');
    break;

    default:
      include('page/logPage.php');
    break;
    
}

?>