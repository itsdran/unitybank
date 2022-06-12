<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="transfer-funds-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Navbar sample</title>
</head>
<body>
    <?php include ("navbarfixed.php");?>
    <div class="body">
        <div class="transfer-contain">
            <div class="head-color">
                <div class="head-text">
                    Select Source Account
                </div>
            </div>
            <table class="tg" style="width: 100%;">
            <thead>
              <tr>
                <th class="tg-errm" style="width: 50px" class="smoller"></th>
                <th class="tg-style" style="width: 350px"><p>Account Number</p></th>
                <th class="tg-style"><p>Account Type</p></th>
                <th class="tg-style"><p>Balance</p></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-style"><input type="radio" name="source" class="smoller"></input></td>
                <td class="tg-style"><p>Lorem ipsum dolor sit amet</p></td>
                <td class="tg-style"><p>Nulla non malesuada quam</p></td>
                <td class="tg-style"><p>PHP 354,548</p></td>
              </tr>
              <tr>
                <td class="tg-style"><input type="radio" name="source" class="smoller"></input></td>
                <td class="tg-style"><p>Consectetur adipiscing elit</p></td>
                <td class="tg-style"><p>Sed quis ipsum mauris</p></td>
                <td class="tg-style"><p>PHP 311,637</p></td>
              </tr>
            </tbody>
            </table>

            <div class="head-color">
                <div class="head-text">
                    Select Target Account
                </div>
            </div>
            <table class="tg" style="width: 100%;">
            <tbody>
                <tr>
                    <td class="tg-style" style="width: 50px"><input type="radio" name="target" class="smoller"></input></td>
                    <td class="tg-style" style="width: 350px"><p>Own Account</p></td>
                    <td class="tg-style"><p><input type="text" class="texto" placeholder="[Select Account]"></input></p></td>
                </tr>
                <tr>
                    <td class="tg-style"><input type="radio" name="target" class="smoller"></input></td>
                    <td class="tg-style"><p>Registered 3rd Party Account</p></td>
                    <td class="tg-style"><p><input type="text" class="texto" placeholder="[Select Account]"></input></p></td>                
                </tr>
                <tr>
                    <td class="tg-style"><input type="radio" name="target" class="smoller"></input></td>
                    <td class="tg-style"><p>Unregistered Account</p></td>
                    <td class="tg-style"><p><input type="text" class="texto" placeholder="[Select Account]"></input></p></td>
                </tr>
            </tbody>
            </table>

            <div class="head-color">
                <div class="head-text">
                    Enter Amount
                </div>
            </div>
            <table class="tg" style="width: 100%;">
            <tbody>
                <tr>
                    <td class="tg-style" style="width: 80px"><p><center>PHP</center></p></td>
                    <td class="tg-style" style="width: 500px"><p><input type="text" class="texto" placeholder="(e.g. 1000.00)"></input></p></td>
                </tr>
            </tbody>
            </table>

            <div class="head-color">
                <div class="head-text">
                    Select Transfer Type
                </div>
            </div>
            <table class="tg" style="width: 100%;">
            <tbody>
                <tr>
                    <td class="tg-style" style="width: 50px"><input type="radio" name="type" class="smoller"></input></td>
                    <td class="tg-style" style="width: 1000px"><p>Immediate</p></td>
                </tr>
                <tr>
                    <td class="tg-style"><input type="radio" name="type" class="smoller"></input></td>
                    <td class="tg-style"><p>Scheduled</p></td>                
                </tr>
            </tbody>
            </table>
            <table class="tg" style="width: 100%;">
            <tbody>
                <tr>
                    <td class="tg-style" style="width: 80px"><p><center>Remarks</center></p></td>
                    <td class="tg-style" style="width: 500px"><p><input type="text" class="texto" placeholder="(Send a message)"></input></p></td>
                </tr>
            </tbody>
            </table>
            <button class="button button1">Reset</button>
            <button class="button button2">Continue</button>
        </div>
    </div>
</div>
</body>
</html>