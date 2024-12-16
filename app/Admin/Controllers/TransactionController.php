<?php

namespace App\Admin\Controllers;


use App\Models\Transaction;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
class TransactionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Transaction';

    /**
     * Make a grid builder.
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
            $filter->date('XF_TXDATE', 'Transaction Date');
            $filter->equal('VIPACCOUNTNO', 'VIP Account Number')->integer();
            $filter->like('XF_DOCNO', 'Document Number');
            $filter->like('XF_CREATETIME', 'Transaction Create Time');
            $filter->equal('XF_MALLID', 'Mall Id');
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Transaction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('PAYMENT_ID', __('PAYMENT ID'));
        $show->field('TRANSACTION_ID', __('TRANSACTION ID'));
        $show->field('KDP_SERIAL_NUMER', __('KDP SERIAL NUMER'));
        $show->field('CRM_ID', __('CRM ID'));
        $show->field('XF_STORECODE', __('XF STORECODE'));
        $show->field('XF_TXDATE', __('XF TXDATE'));
        $show->field('XF_DOCNO', __('XF DOCNO'));
        $show->field('XF_VIPCODE', __('XF VIPCODE'));
        $show->field('XF_AMT', __('XF AMT'));
        $show->field('XF_BONUS', __('XF BONUS'));
        $show->field('XF_REMARK', __('XF REMARK'));
        $show->field('XF_TILLID', __('XF TILLID'));
        $show->field('XF_VIPID', __('XF VIPID'));
        $show->field('XF_SALESMEMOPHOTO', __('XF SALESMEMOPHOTO'));
        $show->field('XF_PAYMETHODCODE', __('XF PAYMETHODCODE'));
        $show->field('XF_CREATETIME', __('XF CREATETIME'));
        $show->field('XF_CURRENCYCODE', __('XF CURRENCYCODE'));
        $show->field('XF_TXTIME', __('XF TXTIME'));
        $show->field('XF_RULEID', __('XF RULEID'));
        $show->field('XF_GVAMOUNT', __('XF GVAMOUNT'));
        $show->field('XF_ITEMCODE', __('XF ITEMCODE'));
        $show->field('XF_TRADESOURCES', __('XF TRADESOURCES'));
        $show->field('XF_PROMOTIONAMOUNT', __('XF PROMOTIONAMOUNT'));
        $show->field('XF_TENDERCODE', __('XF TENDERCODE'));
        $show->field('XF_BANKCARDPHOTO', __('XF BANKCARDPHOTO'));
        $show->field('XF_SALESTIME', __('XF SALESTIME'));
        $show->field('XF_REMARK2', __('XF REMARK2'));
        $show->field('XF_PROMOTYPE', __('XF PROMOTYPE'));
        $show->field('XF_STANDARDBONUS', __('XF STANDARDBONUS'));
        $show->field('XF_PROMOBONUS', __('XF PROMOBONUS'));
        $show->field('XF_ISSUINGBANK', __('XF ISSUINGBANK'));
        $show->field('XF_VIPGRADE', __('XF VIPGRADE'));
        $show->field('XF_EXPERIENCECARD', __('XF EXPERIENCECARD'));
        $show->field('ORADOCNO', __('ORADOCNO'));
        $show->field('BONUSOURCE', __('BONUSOURCE'));
        $show->field('ORAGINAMOUNT', __('ORAGINAMOUNT'));
        $show->field('XF_BATCH_ID', __('XF BATCH ID'));
        $show->field('XF_BONUS_EXPIRE_TYPE', __('XF BONUS EXPIRE TYPE'));
        $show->field('XF_BONUS_EXPIRE_TIME', __('XF BONUS EXPIRE TIME'));
        $show->field('XF_CONFIRMBY', __('XF CONFIRMBY'));
        $show->field('XF_CONFIRMDATE', __('XF CONFIRMDATE'));
        $show->field('XF_VOIDSTATUS', __('XF VOIDSTATUS'));
        $show->field('XF_STORENAME', __('XF STORENAME'));
        $show->field('VIPACCOUNTNO', __('VIPACCOUNTNO'));
        $show->field('COMPLETED_DATE', __('COMPLETED DATE'));
        $show->field('XF_ACTION', __('XF ACTION'));
        $show->field('XF_MALLID', __('XF MALLID'));
        $show->field('XF_STORENAME_SC', __('XF STORENAME SC'));
        $show->field('XF_STORENAME_TC', __('XF STORENAME TC'));
        $show->field('XF_APPROVAL_ID', __('XF APPROVAL ID'));
        $show->field('XF_ISPROVED', __('XF ISPROVED'));
        $show->field('OCRAPPROVEUPLOADBATCHID', __('OCRAPPROVEUPLOADBATCHID'));
        $show->field('NEW_DATA_IND', __('NEW DATA IND'));
        $show->field('XF_VOIDREASON', __('XF VOIDREASON'));
        $show->field('PointRegAmt', __('PointRegAmt'));
        $show->field('ServiceChargeAmt', __('ServiceChargeAmt'));
        $show->field('KDorllaerAmt', __('KDorllaerAmt'));
        $show->field('CouponAmt', __('CouponAmt'));
        $show->field('CouponIds', __('CouponIds'));
        $show->field('UploadChannel', __('UploadChannel'));
        $show->field('AuthCode', __('AuthCode'));
        $show->field('CardNumber', __('CardNumber'));
        $show->field('LASTMODIFYDATE', __('LASTMODIFYDATE'));
        $show->field('LASTMODIFYUSER', __('LASTMODIFYUSER'));
        $show->field('campaign', __('Campaign'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Transaction());

        $form->text('PAYMENT_ID', __('PAYMENT ID'));
        $form->text('TRANSACTION_ID', __('TRANSACTION ID'));
        $form->text('KDP_SERIAL_NUMER', __('KDP SERIAL NUMER'));
        $form->text('CRM_ID', __('CRM ID'));
        $form->text('XF_STORECODE', __('XF STORECODE'));
        $form->datetime('XF_TXDATE', __('XF TXDATE'))->default(date('Y-m-d H:i:s'));
        $form->text('XF_DOCNO', __('XF DOCNO'));
        $form->text('XF_VIPCODE', __('XF VIPCODE'));
        $form->decimal('XF_AMT', __('XF AMT'));
        $form->decimal('XF_BONUS', __('XF BONUS'));
        $form->text('XF_REMARK', __('XF REMARK'));
        $form->text('XF_TILLID', __('XF TILLID'));
        $form->text('XF_VIPID', __('XF VIPID'));
        $form->text('XF_SALESMEMOPHOTO', __('XF SALESMEMOPHOTO'));
        $form->text('XF_PAYMETHODCODE', __('XF PAYMETHODCODE'));
        $form->datetime('XF_CREATETIME', __('XF CREATETIME'))->default(date('Y-m-d H:i:s'));
        $form->text('XF_CURRENCYCODE', __('XF CURRENCYCODE'));
        $form->text('XF_TXTIME', __('XF TXTIME'));
        $form->text('XF_RULEID', __('XF RULEID'));
        $form->decimal('XF_GVAMOUNT', __('XF GVAMOUNT'));
        $form->text('XF_ITEMCODE', __('XF ITEMCODE'));
        $form->text('XF_TRADESOURCES', __('XF TRADESOURCES'));
        $form->decimal('XF_PROMOTIONAMOUNT', __('XF PROMOTIONAMOUNT'));
        $form->text('XF_TENDERCODE', __('XF TENDERCODE'));
        $form->text('XF_BANKCARDPHOTO', __('XF BANKCARDPHOTO'));
        $form->text('XF_SALESTIME', __('XF SALESTIME'));
        $form->text('XF_REMARK2', __('XF REMARK2'));
        $form->text('XF_PROMOTYPE', __('XF PROMOTYPE'));
        $form->decimal('XF_STANDARDBONUS', __('XF STANDARDBONUS'));
        $form->decimal('XF_PROMOBONUS', __('XF PROMOBONUS'));
        $form->text('XF_ISSUINGBANK', __('XF ISSUINGBANK'));
        $form->text('XF_VIPGRADE', __('XF VIPGRADE'));
        $form->text('XF_EXPERIENCECARD', __('XF EXPERIENCECARD'));
        $form->text('ORADOCNO', __('ORADOCNO'));
        $form->text('BONUSOURCE', __('BONUSOURCE'));
        $form->decimal('ORAGINAMOUNT', __('ORAGINAMOUNT'));
        $form->text('XF_BATCH_ID', __('XF BATCH ID'));
        $form->text('XF_BONUS_EXPIRE_TYPE', __('XF BONUS EXPIRE TYPE'));
        $form->date('XF_BONUS_EXPIRE_TIME', __('XF BONUS EXPIRE TIME'))->default(date('Y-m-d'));
        $form->text('XF_CONFIRMBY', __('XF CONFIRMBY'));
        $form->date('XF_CONFIRMDATE', __('XF CONFIRMDATE'))->default(date('Y-m-d'));
        $form->text('XF_VOIDSTATUS', __('XF VOIDSTATUS'));
        $form->text('XF_STORENAME', __('XF STORENAME'));
        $form->text('VIPACCOUNTNO', __('VIPACCOUNTNO'));
        $form->datetime('COMPLETED_DATE', __('COMPLETED DATE'))->default(date('Y-m-d H:i:s'));
        $form->text('XF_ACTION', __('XF ACTION'));
        $form->text('XF_MALLID', __('XF MALLID'));
        $form->text('XF_STORENAME_SC', __('XF STORENAME SC'));
        $form->text('XF_STORENAME_TC', __('XF STORENAME TC'));
        $form->text('XF_APPROVAL_ID', __('XF APPROVAL ID'));
        $form->text('XF_ISPROVED', __('XF ISPROVED'));
        $form->text('OCRAPPROVEUPLOADBATCHID', __('OCRAPPROVEUPLOADBATCHID'));
        $form->text('NEW_DATA_IND', __('NEW DATA IND'))->default('1');
        $form->text('XF_VOIDREASON', __('XF VOIDREASON'));
        $form->decimal('PointRegAmt', __('PointRegAmt'));
        $form->decimal('ServiceChargeAmt', __('ServiceChargeAmt'));
        $form->decimal('KDorllaerAmt', __('KDorllaerAmt'));
        $form->decimal('CouponAmt', __('CouponAmt'));
        $form->textarea('CouponIds', __('CouponIds'));
        $form->textarea('UploadChannel', __('UploadChannel'));
        $form->text('AuthCode', __('AuthCode'));
        $form->textarea('CardNumber', __('CardNumber'));
        $form->datetime('LASTMODIFYDATE', __('LASTMODIFYDATE'))->default(date('Y-m-d H:i:s'));
        $form->text('LASTMODIFYUSER', __('LASTMODIFYUSER'));
        $form->textarea('campaign', __('Campaign'));

        return $form;
    }
}
