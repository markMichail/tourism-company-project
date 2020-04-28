<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicket extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //not finished yet
        return [
            'ticketNumber' => 'required|max:255|numeric',
            'passengerName' => 'required|max:150',
            'destination' => 'required',
            'transportationCompany'=>'required',
            'type'=>'required | in:void,credit,ticket',
            'rsoom'=>'required | numeric',
            'percentageAsasy'=>'required | numeric',
            'comission'=>'required | numeric',
            'comissionTax'=>'required | numeric',
            'bsp'=>'required | numeric',
            'sellprice'=>'required | numeric',
            'profit'=>'required | numeric',
            'safy'=>'required | numeric',
            'paymentType'=>'required | in:visa,cash,check',
            'asasy'=>'required | numeric',
        ];
    }

    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        if ($this->get('rsoom') + $this->get('asasy')  != $this->get('total')) {
            $validator->errors()->add('total', 'The sum of total is not correct');
        }
    });
}
}
