<?php
/**
 * Created by PhpStorm.
 * User: CYUT
 * Date: 2019/3/19
 * Time: 上午 09:17
 */

namespace App\Share\Pagination;
use Illuminate\Http\Request;

class Pagination extends BasePagination
{
    /**
     * 總筆數屬性
     * @type {number}
     */
    public $total;
    /**
     * 總頁數屬性
     * @type {number}
     */
    public $totalPage;
    public function __construct(Request $request,$total)
    {
        parent::__construct($request);
        $this->total=$total;
        $this->totalPage=ceil($total / $this->perPage);
    }

}