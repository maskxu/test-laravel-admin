<?php

namespace App\Admin\Controllers;


use App\Models\Transaction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Grid\Displayers\Actions;
use Encore\Admin\Admin;
class TransactionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Transaction';

    /**
     * 列表页
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transaction());
        $grid->column('id', __('ID'));
        $grid->column('PAYMENT_ID', __('Payment Id'));
        $grid->column('TRANSACTION_ID', __('Transaction Id'));
        $grid->column('KDP_SERIAL_NUMER', __('KDP Serial Number'));
        $grid->column('XF_STORECODE', __('Store Code'));
        $grid->column('XF_TXDATE', __('Transaction Date'))->date('Y-m-d');
        $grid->column('XF_DOCNO', __('Document Number'));
        $grid->column('XF_VIPCODE', __('VIP Code'));
        $grid->column('XF_AMT', __('Amount'));
        $grid->column('XF_CREATETIME', __('Transaction Create Time'));
        $grid->column('XF_TXTIME', __('Transaction Time'));
        $grid->column('XF_TENDERCODE', __('Tender Code'));
        $grid->column('XF_SALESTIME', __('Sales Time'));
        $grid->column('XF_VIPGRADE', __('VIP Grade'));
        $grid->column('XF_VOIDSTATUS', __('Void Status'))->bool();
        $grid->column('VIPACCOUNTNO', __('VIP Account Number'));
        $grid->column('XF_MALLID', __('Mall Id'));
        $grid->column('XF_CREATETIME', __('Create Time'));
        $grid->column('LASTMODIFYDATE', __('Update Time'));

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            //filter条件
            $filter->like('PAYMENT_ID', 'Payment Id');
            $filter->like('TRANSACTION_ID', 'Transaction Id');
            $filter->equal('KDP_SERIAL_NUMER', 'KDP Serial Number')->integer();
            $filter->like('XF_STORECODE','Store Code');
            $filter->date('XF_TXDATE', 'Transaction Date')->datetime();
            $filter->equal('VIPACCOUNTNO', 'VIP Account Number')->integer();
            $filter->like('XF_DOCNO', 'Document Number');
            $filter->between('XF_CREATETIME', 'Transaction Create Time')->datetime();;
            $filter->equal('XF_MALLID', 'Mall Id');


        });
        //不要创建按钮。不要批处理按钮 不要选择按钮
        $grid->disableCreateButton();
        $grid->disableColumnSelector();
        $grid->disableBatchActions();
        $grid->setActionClass(Actions::class);
        // 禁用编辑和删除功能
        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableDelete();
        });
        //将filter按钮移动到右边
        Admin::style('.pull-left { float: right !important}');
        return $grid;
    }

    /**
     * 详情页
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Transaction::findOrFail($id));
        $show->field('id', __('ID'));
        $show->field('PAYMENT_ID', __('Payment Id'));
        $show->field('TRANSACTION_ID', __('Transaction Id'));
        $show->field('KDP_SERIAL_NUMER', __('KDP SERIAL NUMER'));
        $show->field('CRM_ID', __('CRM Id'));
        $show->field('XF_STORECODE', __('Store Code'));
        $show->field('XF_TXDATE', __('Transaction Date'));
        $show->field('XF_DOCNO', __('Document Number'));
        $show->field('XF_VIPCODE', __('VIP Code'));
        $show->field('XF_AMT', __('Amount'));
        $show->field('XF_BONUS', __('Bonus'));
        $show->field('XF_REMARK', __('Remark'));
        $show->field('XF_SALESMEMOPHOTO', __('Sales Memo Photo'));
        $show->field('XF_PAYMETHODCODE', __('Pay Method Code'));
        $show->field('XF_CREATETIME', __('Transaction Create Time'));
        $show->field('XF_CURRENCYCODE', __('Currency Code'));
        $show->field('XF_TXTIME', __('Transaction Time'));
        $show->field('XF_GVAMOUNT', __('Gift Voucher Amount'));
        $show->field('XF_TRADESOURCES', __('Trade Sources'));
        $show->field('XF_TENDERCODE', __('Tender Code'));
        $show->field('XF_BANKCARDPHOTO', __('Bank Card Photo'));
        $show->field('XF_SALESTIME', __('Sales Time'));
        $show->field('XF_REMARK2', __('Remark 2'));
        $show->field('XF_ISSUINGBANK', __('Issuing Bank'));
        $show->field('XF_VIPGRADE', __('VIP Grade'));
        $show->field('ORADOCNO', __('ORA Document Number'));
        $show->field('ORAGINAMOUNT', __('ORAGIN Amount'));
        $show->field('XF_BATCH_ID', __('Batch Id'));
        $show->field('XF_BONUS_EXPIRE_TYPE', __('Bonus Expire Type'));
        $show->field('XF_BONUS_EXPIRE_TIME', __('Bonus Expire Time'));
        $show->field('XF_VOIDSTATUS', __('Void Status'));
        $show->field('VIPACCOUNTNO', __('VIP Account Number'));
        $show->field('COMPLETED_DATE', __('Completed Date'));
        $show->field('XF_MALLID', __('Mall Id'));
        $show->field('XF_STORENAME', __('Store Name'));
        $show->field('XF_STORENAME_SC', __('Store Name SC'));
        $show->field('XF_STORENAME_TC', __('Store Name TC'));
        $show->field('OCRAPPROVEUPLOADBATCHID', __('OCR Approve Upload Batch Id'));
        $show->field('XF_VOIDREASON', __('Void Reason'));
        $show->field('PointRegAmt', __('Point Reg Amount'));
        $show->field('ServiceChargeAmt', __('Service Charge Amount'));
        $show->field('KDorllaerAmt', __('K Dollar Amount'));
        $show->field('CouponAmt', __('Coupon Amount'));
        $show->field('campaign', __('Campaign'));

        //不用修改 不用删除
        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableDelete();
            });;

        return $show;
    }
}