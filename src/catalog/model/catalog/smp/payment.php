<?php

use Cardinity\Method\Payment\Get;

class ModelCatalogSmpPayment extends Model
{

    public function getOrderPaymentDetails($order_id, $payment_code, $payment_method)
	{
	
		if ($payment_code == 'wayforpay') {
			$payment_details = $this->getWayforpayPaymentDetails($order_id);
		} elseif ($payment_code == 'lqp') {
			
		} else {
			$payment_details = []; // short form for array
		}
		
		return $payment_details;

	}

	protected function getWayforpayPaymentDetails(int $order_id) 
	{

		$data = [];
		return $data;

	}

	protected function getLiqpayPaymentData(int $order_id)
	{

		$sql_payment_details = "SELECT * FROM `" . DB_PREFIX . "lqp_list` WHERE order_id = $order_id";
		$query = $this->db->query($sql_payment_details);

		return ($query->num_rows > 0) ? $query->rows : [];

	}

}

?>