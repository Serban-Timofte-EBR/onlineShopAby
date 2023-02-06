<?php
    use yii\helpers\Html;

    $this->title = 'Checkout';
?>

<!--====== Page Banner Start ======-->
<section class="page-banner bg_cover">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Checkout</h2>
        </div>
    </div>
</section>
<!--====== Page Banner Ends ======-->

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
         <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
         <h4><i class="icon fa fa-check"></i>Error!</h4>
         <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<!--====== Checkout Start ======-->
<section class="checkout-page pb-80">
    <div class="container">
        <form action="<?= Yii::$app->Url->path ?>site/place-order" method="POST">
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-form mt-30">

                        <div class="checkout-title">
                            <h4 class="title">Detalii de facturare</h4>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label>Prenume *</label>
                                    <input name="first_name_direct" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label>Nume *</label>
                                    <input name="last_name_direct" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label>Companie</label>
                                    <input name="company_name_direct" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label>Adresa de livrare *</label>
                                    <input name="address_line_1_direct" type="text" placeholder="House number and street name" required>
                                    <input name="address_line_2_direct" type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label>Oraș *</label>
                                    <input name="city_direct" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label>Judeţ</label>
                                    <input name="county_direct" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label>Cod Poștal</label>
                                    <input name="postcode_direct" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label>Telefon *</label>
                                    <input name="phone_direct" type="text" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label>Adresa de E-mail *</label>
                                    <input name="email_direct" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="checkbox checkout-checkbox">
                            <input name="indirect_true" type="checkbox" id="shipping">
                            <label for="shipping"><span></span> Adresele de livrare și facturare sunt diferite?</label>
                        </div>

                        <div class="checkout-shipping">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="single-form">
                                        <label>Prenume *</label>
                                        <input name="first_name_indirect" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-form">
                                        <label>Nume *</label>
                                        <input name="last_name_indirect" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="single-form">
                                        <label>Numele Companiei</label>
                                        <input name="company_indirect" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="single-form">
                                        <label>Adresa *</label>
                                        <input name="address_line_1_indirect" type="text" placeholder="House number and street name">
                                        <input name="address_line_2_indirect" type="text" placeholder="Apartment, suite, unit etc. (optional)">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="single-form">
                                        <label>Oras *</label>
                                        <input name="city_indirect" type="text">
                                    </div>
                                </div>
                            
                                <div class="col-sm-12">
                                    <div class="single-form">
                                        <label>Cod Postal</label>
                                        <input name="postcode_indirect" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-form">
                                        <label>Telefon *</label>
                                        <input name="phone_indirect" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="single-form">
                                        <label>Adresa de E-mail *</label>
                                        <input name="email_indirect" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single-form checkout-note">
                            <label>Order notes</label>
                            <textarea name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="checkout-review-order mt-30">
                        <div class="checkout-title">
                            <h4 class="title">Your Order</h4>
                        </div>

                        <div class="checkout-review-order-table table-responsive mt-15">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="Product-name">Produs</th>
                                        <th class="Product-price">Total Produs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach (Yii::$app->cart->getItems() as $item):
                                            $product = $item->getProduct();
                                    ?>
                                        <tr>
                                            <td class="Product-name">
                                                <p><?= $product->product_name ?>  × <?= $item->getQuantity() ?></p>
                                            </td>
                                            <td class="Product-price">
                                                <p><?= number_format($item->getPrice(), 2, ',', ' '); ?> RON</p>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Subtotal</p>
                                        </td>
                                        <td class="Product-price">
                                            <p><?= number_format(Yii::$app->cart->getTotalCost(), 2, ',', ' ') ?> RON</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Shipping</p>
                                        </td>
                                        <td class="Product-price">
                                            <ul class="shipping-list">
                                                <li class="radio">
                                                    <input type="radio" name="shipping" id="radio1" checked>
                                                    <label for="radio1"><span></span> Curier Rapid</label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Total</p>
                                        </td>
                                        <td class="total-price">
                                            <p><?= number_format(Yii::$app->cart->getTotalCost(), 2, ',', ' '); ?> RON</p>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="checkout-payment">
                            <ul>
                                <li>
                                    <div class="single-payment">
                                        <div class="payment-radio radio">
                                            <input type="radio" name="radio" id="cash" value="cash">
                                            <label for="cash"><span></span> Ramburs la Livrare </label>

                                            <div class="payment-details">
                                                <p>Plata se va face cash, la livrare.</p>
                                            </div>
                                        </div>                                 
                                    </div>
                                </li>
                                <li>
                                    <div class="single-payment">
                                        <div class="payment-radio radio">
                                            <input type="radio" name="radio" id="card" value="card">
                                            <label for="card"><span></span> Card de credit / debit </label>

                                            <div class="payment-details">
                                                <p>Plata se va face cu cardul, pe portalul nostru.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                            <div class="checkout-btn">
                                <input type="submit" class="main-btn btn-block" value="Place Order" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--====== Checkout Ends ======-->