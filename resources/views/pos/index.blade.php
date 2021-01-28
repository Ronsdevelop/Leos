@extends('adminlte::page')

@section('title', 'Home')
@section('sidebar_collapse', true)

@section('content_header')

@stop

@section('content')

<table style="width:100%;" class="layout-table">
    <tr>
        <td style="width: 460px;">

            <div id="pos">
                <form action="" id="pos-sale-form" method="post" accept-charset="utf-8">
                    <div class="well well-sm" id="leftdiv">
                        <div id="lefttop" style="margin-bottom:5px;">
                            <div class="form-group" style="margin-bottom:5px;">
                                <div class="input-group">
                                    <select name="customer_id" id="spos_customer" data-placeholder="Seleccionar Cliente" required="required" class="form-control select2" style="width:100%;position:absolute;">
                                    <option value="1">Walk-in Client</option>
                                    <option value="2">Gustavo</option>
                                    <option value="3" selected="selected">Camilo </option>
                                    <option value="4">JEAN CARLSO ARANGO</option>
                                    <option value="5">011 edire</option>
                                    <option value="6">ahdir</option>
                                    <option value="7">FLAVIO CESAR ROA LEIVA</option>
                                    <option value="8">Moisés Castillo</option>
                                    <option value="9">Público general</option>
                                    </select>
                                    <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                        <a href="#" id="add-customer"   data-toggle="modal" data-target="#myModal"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                            <div class="form-group" style="margin-bottom:5px;">
                                <input type="text" name="hold_ref" value="" id="hold_ref" class="form-control kb-text" placeholder="Nota de referencia" />
                            </div>
                            <div class="form-group" style="margin-bottom:5px;">
                                <input type="text" name="code" id="add_item" class="form-control" placeholder="Busque el producto por codigo o nombre, también puede escanear el codigo de barras" />
                            </div>
                        </div>

                        <div id="print" class="fixed-table-container">
                            <div id="list-table-div">

                                <table id="posTable" class="table table-striped table-condensed table-hover list-table" style="margin:0px;" data-height="100">
                                    <thead>
                                        <tr class="success">
                                            <th>Producto</th>
                                            <th style="width: 15%;text-align:center;">Precio</th>
                                            <th style="width: 15%;text-align:center;">Cantidad</th>
                                            <th style="width: 20%;text-align:center;">Subtotal</th>
                                            <th class="text-center w-10" ><i class="fa fa-trash"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="danger" data-item-id=" " data-id="6">
                                            <td>
                                                <input name="product_id[]" type="hidden" class="rid" value="6">
                                                <input name="item_comment[]" type="hidden" class="ritem_comment" value="">
                                                <input name="product_code[]" type="hidden" value="100100">
                                                <input name="product_name[]" type="hidden" value="CARNE">
                                                <button type="button" class="btn btn-block btn-xs edit btn-warning" id="1611796831193" data-item="16117954678333">
                                                    <span class="sname" id="name_1611796831193">CARNE (100100)</span>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <input class="realuprice" name="real_unit_price[]" type="hidden" value="16000.0000">
                                                <input class="rdiscount" name="product_discount[]" type="hidden" id="discount_1611796831193" value="0">
                                                <span class="text-right sprice" id="sprice_1611796831193">€16,000</span>
                                            </td>
                                            <td>
                                                <input name="item_was_ordered[]" type="hidden" class="riwo" value="0">
                                                <input class="form-control input-qty kb-pad text-center rquantity" name="quantity[]" type="text" value="1" data-id="1611796831193" data-item="16117954678333" id="quantity_1611796831193" onclick="this.select();">
                                            </td>
                                            <td class="text-right">
                                                <span class="text-right ssubtotal" id="subtotal_1611796831193">€16,000</span>
                                            </td>
                                            <td class="text-center"><i class="fa fa-trash-o"></td>
                                        </tr>
                                        <tr id="" class="danger" data-item-id="" data-id="6">
                                            <td>
                                                <input name="product_id[]" type="hidden" class="rid" value="6">
                                                <input name="item_comment[]" type="hidden" class="ritem_comment" value="">
                                                <input name="product_code[]" type="hidden" value="100100">
                                                <input name="product_name[]" type="hidden" value="CARNE">
                                                <button type="button" class="btn btn-block btn-xs edit btn-warning" id="1611796831193" data-item="16117954678333">
                                                    <span class="sname" id="name_1611796831193">CARNE (100100)</span>
                                                </button>
                                            </td>
                                            <td class="text-right">
                                                <input class="realuprice" name="real_unit_price[]" type="hidden" value="16000.0000">
                                                <input class="rdiscount" name="product_discount[]" type="hidden" id="discount_1611796831193" value="0">
                                                <span class="text-right sprice" id="sprice_1611796831193">€16,000</span>
                                            </td>
                                            <td>
                                                <input name="item_was_ordered[]" type="hidden" class="riwo" value="0">
                                                <input class="form-control input-qty kb-pad text-center rquantity" name="quantity[]" type="text" value="1" data-id="1611796831193" data-item="16117954678333" id="quantity_1611796831193" onclick="this.select();">
                                            </td>
                                            <td class="text-right">
                                                <span class="text-right ssubtotal" id="subtotal_1611796831193">€16,000</span>
                                            </td>
                                            <td class="text-center"><i class="fa fa-trash-o"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div id="totaldiv">
                                <table id="totaltbl" class="table table-condensed totals" style="margin-bottom:10px;">
                                    <tbody>
                                        <tr class="info">
                                            <td width="25%">Articulos totales</td>
                                            <td class="text-right" style="padding-right:10px;"><span id="count">0</span></td>
                                            <td width="25%">Total</td>
                                            <td class="text-right" colspan="2"><span id="total">0</span></td>
                                        </tr>
                                        <tr class="info">
                                            <td width="25%"><a href="#" id="add_discount">Descuento</a></td>
                                            <td class="text-right" style="padding-right:10px;"><span id="ds_con">0</span></td>
                                            <td width="25%"><a href="#" id="add_tax">Orden impuesto</a></td>
                                            <td class="text-right"><span id="ts_con">0</span></td>
                                        </tr>
                                        <tr class="success">
                                            <td colspan="2" style="font-weight:bold;">
                                                Total a pagar
                                                <a role="button" data-toggle="modal" data-target="#noteModal">
                                                    <i class="fa fa-comment"></i>
                                                </a>
                                            </td>
                                            <td class="text-right" colspan="2" style="font-weight:bold;">
                                                <span id="total-payable">0</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="botbuttons" class="col-xs-12 text-center">
                            <div class="row">
                                <div class="col-xs-4" style="padding: 0;">
                                    <div class="btn-group-vertical btn-block">
                                        <button type="button" class="btn btn-warning btn-block btn-flat"
                                        id="suspend">Hold</button>
                                        <button type="button" class="btn btn-danger btn-block btn-flat"
                                        id="reset">Cancelar</button>
                                    </div>

                                </div>
                                <div class="col-xs-4" style="padding: 0 5px;">
                                    <div class="btn-group-vertical btn-block">
                                        <button type="button" class="btn bg-purple btn-block btn-flat" id="print_order">Imprimir orden</button>

                                        <button type="button" class="btn bg-navy btn-block btn-flat" id="print_bill">Imprimir factura</button>
                                    </div>
                                </div>
                                <div class="col-xs-4" style="padding: 0;">
                                    <button type="button" class="btn btn-success btn-block btn-flat" id="payment" style="height:67px;">Pago</button>
                                </div>
                            </div>

                        </div>


                        <input type="hidden" name="spos_note" value="" id="spos_note">

                        <div id="payment-con">
                            <input type="hidden" name="amount" id="amount_val" value=""/>
                            <input type="hidden" name="balance_amount" id="balance_val" value=""/>
                            <input type="hidden" name="paid_by" id="paid_by_val" value="cash"/>
                            <input type="hidden" name="cc_no" id="cc_no_val" value=""/>
                            <input type="hidden" name="paying_gift_card_no" id="paying_gift_card_no_val" value=""/>
                            <input type="hidden" name="cc_holder" id="cc_holder_val" value=""/>
                            <input type="hidden" name="cheque_no" id="cheque_no_val" value=""/>
                            <input type="hidden" name="cc_month" id="cc_month_val" value=""/>
                            <input type="hidden" name="cc_year" id="cc_year_val" value=""/>
                            <input type="hidden" name="cc_type" id="cc_type_val" value=""/>
                            <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value=""/>
                            <input type="hidden" name="balance" id="balance_val" value=""/>
                            <input type="hidden" name="payment_note" id="payment_note_val" value=""/>
                        </div>
                        <input type="hidden" name="customer" id="customer" value="3" />
                        <input type="hidden" name="order_tax" id="tax_val" value="" />
                        <input type="hidden" name="order_discount" id="discount_val" value="" />
                        <input type="hidden" name="count" id="total_item" value="" />
                        <input type="hidden" name="did" id="is_delete" value="0" />
                        <input type="hidden" name="eid" id="is_delete" value="0" />
                        <input type="hidden" name="total_items" id="total_items" value="0" />
                        <input type="hidden" name="total_quantity" id="total_quantity" value="0" />
                        <input type="submit" id="submit" value="Submit Sale" style="display: none;" />
                    </div>
                </form>
            </div>

        </td>
        <td>
            <div class="contents" id="right-col">
                <div id="item-list">
                    <div class="items">
                        <div>
                            <button type="button" data-name="leche" id="product-0024" type="button" value='0102' class="btn btn-name btn-default btn-flat product">leche</button>
                            <button type="button" data-name="CARNE" id="product-0006" type="button" value='100100' class="btn btn-name btn-default btn-flat product">CARNE</button>
                            <button type="button" data-name="Pan" id="product-0022" type="button" value='12345567' class="btn btn-name btn-default btn-flat product">Pan</button>
                            <button type="button" data-name="CEVILAT ADULTO CAJA X 10 SORES" id="product-0007" type="button" value='123456' class="btn btn-name btn-default btn-flat product">CEVILAT ADULTO CAJA X 10 SORES</button>
                            <button type="button" data-name="CATERINE ZAPATA SERNA" id="product-0023" type="button" value='23532332343344' class="btn btn-name btn-default btn-flat product">CATERINE ZAPATA SERNA</button>
                            <button type="button" data-name="tttt" id="product-0025" type="button" value='526352' class="btn btn-name btn-default btn-flat product">tttt</button>
                        </div>
                    </div>
                </div>
                <div class="product-nav">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button style="z-index:10002;" class="btn btn-warning pos-tip btn-flat" type="button" id="previous"><i class="fa fa-chevron-left"></i></button>
                        </div>
                        <div class="btn-group">
                            <button style="z-index:10003;" class="btn btn-success pos-tip btn-flat" type="button" id="sellGiftCard"><i class="fa fa-credit-card" id="addIcon"></i> Vender tarjeta de regalo</button>
                        </div>
                        <div class="btn-group">
                            <button style="z-index:10004;" class="btn btn-warning pos-tip btn-flat" type="button" id="next"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>



@stop

@section('css')

@stop

@section('js')

@stop
