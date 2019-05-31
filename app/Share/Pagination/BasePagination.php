<?php
/**
 * Created by PhpStorm.
 * User: CYUT
 * Date: 2019/3/19
 * Time: 上午 09:01
 */

namespace App\Share\Pagination;
use Illuminate\Http\Request;

class BasePagination
{
    /**
     * 當前頁面屬性
     * @type {number}
     */
    public $currentPage ;
    /**
     * 每頁顯示幾筆屬性
     * @type {number}
     */
    public $perPage;
    /**
     * 排序關鍵屬性
     * @type {string}
     */
    public $sortKey;
    /**
     * 排序方法屬性，ASC or DESC
     * @type {string}
     */
    public $sortDirection;
    public function __construct(Request $request)
    {
        $this->currentPage=$request->get("currentPage",0);
        $this->perPage=$request->get("perPage",10);
        $this->sortKey=$request->get("sortKey","id");
        $this->sortDirection=$request->get("sortDirection","ASC");
    }
}