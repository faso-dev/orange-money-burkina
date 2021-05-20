<?php
/**
 * @author Yentema Nadjoari <n.yenteck@gmail.com> ,
 * @author S.C Jerôme ONADJA <jeromeonadja28@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Fasodev\Sdk\OrangeMoneyAPI;
use Fasodev\Sdk\PaymentSDK;

require_once __DIR__ . '/../vendor/autoload.php';

$orangeMoneyAPI = new OrangeMoneyAPI("username", "password", "merchantNumber", PaymentSDK::ENV_DEV);

$orangeMoneyAPI->setAmount(1000) // Montant de la transaction
                ->setOTPCode(121212) // Code otp fourni par l'utilisateur
                ->setClientNumber(76819212); // Le numero de client

$sdk = new PaymentSDK($orangeMoneyAPI);

$result = $sdk->handlePayment(); //Enclenchement du processus de paiement

if ($result->status === 200) {

    echo "paiement effectué";
    echo $result->transID;

} else {
    echo "<pre>";
        print_r($result);
    echo "</pre>";
    echo $result->message;
}

