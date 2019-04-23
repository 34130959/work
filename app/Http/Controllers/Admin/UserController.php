<?php
//用户管理
namespace App\Http\Controllers\Admin;

use Faker\Provider\Base;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends BaseController
{
    //用户列表
    public function index(Request $request)
    {
        $data = User::with('role')->get();

        return view('admin.user.index', compact('data'));
    }

    //给datatables 发送数据
    public function getList(Request $request)
    {
        // 开启位置
        $start = $request->get('start', 0);
        // 获取的记录条数
        $length = $request->get('length', $this->pagesize);

        // 排序参数
        $orderArr = $request->get('order')[0];
        // 排序规则
        $orderType = $orderArr['dir'];
        // 排序的字段
        $fieldname = $request->get('columns')[$orderArr['column']]['data'];
        // 判断一下是否是udt
        $fieldname = $fieldname == 'udt' ? 'updated_at' : $fieldname;

        // 日期
        // 开始日期
        $sdt = $request->get('sdt');
        // 结束日期
        $edt = $request->get('edt');

        // 开始
        if (empty($sdt)) {
            $sdt = User::min('updated_at');
        } else {
            $sdt = date('Y-m-d 00:00:00', strtotime($sdt));
        }
        // 结束
        if (empty($edt)) {
            $edt = date('Y-m-d 23:59:59');
        } else {
            $edt = date('Y-m-d 23:59:59', strtotime($edt));
        }

        // 搜索的关键词
        $kw = $request->get('kw');

        // 搜索
        $query = User::whereBetween('updated_at', [$sdt, $edt]);

        if (!empty($kw)) {
            $query = $query->where('username', 'like', "%{$kw}%");
        }


        $count = $query->count();
        $data = $query->with('role')->offset($start)->limit($length)->orderBy($fieldname, $orderType)->get();

        $result = [
            # draw: 客户端调用服务器端次数标识
            'draw' => $request->get('draw'),
            # recordsTotal: 获取数据记录总条数
            'recordsTotal' => $count,
            # recordsFiltered: 数据过滤后的总数量
            'recordsFiltered' => $count,
            # data: 获得的具体数据
            'data' => $data
        ];
        return $result;
    }
}
