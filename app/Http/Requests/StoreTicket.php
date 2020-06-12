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
       // not finished yet
        // return [
        //     'ticketNumber' => 'required | numeric',
        //     'passengerName' => 'required|max:150',
        //     'destination' => 'required',
        //     'transportationCompany'=>'required',
        //     'type'=>'required | in:void,credit,ticket',
        //     'rsoom'=>'required | numeric',
        //     'percentageAsasy'=>'required | numeric',
        //     'comission'=>'required | numeric',
        //     'comissionTax'=>'required | numeric',
        //     'bsp'=>'required | numeric',
        //     'sellprice'=>'required | numeric | min:1',
        //     'profit'=>'required | numeric',
        //     'safy'=>'required | numeric',
        //     'paymentType'=>'required | in:visa,cash,check',
        //     'asasy'=>'required | numeric',
        // ];


        //ctrl K U

        return [
            'ticketNumber' => 'required | numeric | digits_between:4,10',
            'passengerName' => 'required|max:100 |string',
            'destination' => 'required|alpha',
            'transportationCompany'=>'required | alpha | max:80',
            'type'=>'required | in:void,credit,ticket',
            'rsoom'=>'required | numeric |digits_between:3,5 | gt:0',
            'percentageAsasy'=>'required | numeric | between:0,100',
            'comission'=>'required | numeric |digits_between:1,11',
            'comissionTax'=>'required | numeric | between:0,100',
            'bsp'=>'required | numeric |digits_between:1,11',
            'sellprice'=>'required | numeric |digits_between:1,6 |gt:0',
            'profit'=>'required | numeric |digits_between:1,7',
            'safy'=>'required | numeric | digits_between:1,7',
            'paymentType'=>'required | in:visa,cash,check',
            'asasy'=>'required | numeric |digits_between:1,7',
        ];
    }

    public function withValidator($validator)
{
    $validator->after(function ($validator) {
        if ($this->get('rsoom') + $this->get('asasy')  != $this->get('total')) {
            $validator->errors()->add('total', 'The sum of total is not correct');
        }

        if ($this->get('sellprice') - $this->get('total')  != $this->get('profit')) {
            $validator->errors()->add('total', 'The sum of profit is not correct');
        }
       
    });
}
}
