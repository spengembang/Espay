<?php 

/*
 * (c) Aminuddin <sinaunengweb@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

// If you don't to add a custom vendor folder, then use the simple class
// namespace Espay;
namespace spengembang\Espay;

class Espay
{
    /**
     * genSignature
     *
     * @param  String $key
     * @param  DateTime $req_Datetime
     * @param  String $order_id
     * @param  String $mode
     *
     * @return String $signature
     */
    public function genSignature($key, $req_datetime, $order_id, $mode){
        // $key = env('ESPAY_KEY');
        $data = "##".$key."##".$req_datetime."##".$order_id."##".$mode."##";
        $signature = hash('sha256', strtoupper($data));
        return $signature;
    } 

    /**
     * genReconsileID
     *
     * @param  String $member_id
     * @param  String $order_id
     *
     * @return String
     */
    public function genReconsileID($member_id, $order_id)
    {
        $reconsile_id = trim($member_id . " - " . $order_id . date('YmdHis'));
        return $reconsile_id;
    }
}