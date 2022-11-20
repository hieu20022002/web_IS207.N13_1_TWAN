<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đặt hàng</title>
    <link rel="stylesheet" href="../Css/InfoOrder.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body>        
        <form>
            <h1>Thông tin đặt hàng</h1>
            <table> 
               
                <tr>
                    <td><label> Họ và tên  </label></td>
                    <td>    
                        <input type="text">
                    </td>
                </tr>                      
                <tr>
                    <td> <label>  Số điện thoại </label></td>
                    <td>
                        <input type="">
                    </td>               
                </tr>
                <tr>
                    <td> <label>  Email </label></td>
                    <td>
                        <input type="email">
                    </td>                    
                </tr>
                <tr>
                    <td> <label>  Địa chỉ </label></td> 
                    <td>
                    <input type="text">
                    </td>                                  
                </tr>
                <tr>
                    <td><label>  Tỉnh/Thành phố </label></td>
                    <td>
                        <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                        <option value="" selected >Chọn tỉnh thành</option>
                        </select>
                    </td>                                                                                           
                </tr>
                <tr>
                    <td> <label>  Quận/Huyện </label></td> 
                    <td>                           
                        <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">  
                        <option value="" selected>Chọn quận huyện</option>      
                        </select>  
                        </td>                      
                                                                                       
                </tr>
                <tr>
                    <td> <label>  Phường/Xã </label></td> 
                    <td>
                        <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                    </td>                                  
                </tr>
                <tr>
                    <td></td>
                    <td><button>Thay đổi</button></td>
                </tr>
            </table>       
            
        </form>
</body>
</html>