<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Example> $examples
 */
?>
<div class="examples index content">
    <?= $this->Html->link(__('New Example'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Examples') ?></h3>
    <div class="table-responsive">
        <table class="text-center table">
            <thead>
                <tr class="table-active">
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= 'Product Price' ?></th>
                    <th><?= 'Stock' ?></th>
                    <th><?= 'Status' ?></th>
                    <th><?= 'Option' ?></th>
                    <!-- <th class="actions"><?= __('Actions') ?></th> -->
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($examples as $example): ?>

                    <tr class="">
                        <td><?= $this->Number->format($example->id) ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                data-detail="<?= h($example->detail) ?>"
                                data-name="<?= h($example->name) ?>">
                                <?= h($example->name) ?>

                                </button>
                        </td>
                        <td><?= $this->Number->format($example->price) ?></td>
                        <td class="">
                            <?= $this->Number->format($example->stock) ?>

                        </td>
                        <td>
                            <?php if ($example->status == 1) {
                                $badge_text = '<span class="badge badge-pill badge-success">In Stock</span>';
                            } else {
                                $badge_text = '<span class="badge badge-pill badge-danger">Out of Stock</span>';
                            } ?>
                            <?= $badge_text ?>
                        </td>
                        <td>
                            <?php if ($example->stock > 0) {
                                $class = 'btn btn-success';
                                $btn_text = 'Add to cart';
                                // $btn_text = 'Add to cart';
                            } else {
                                $class = 'btn btn-danger disabled';
                            } ?>
                            <?= $this->Form->postLink(
                                __($btn_text),
                                ['action' => 'addToCart', $example->id],
                                ['class' => $class, 'confirm' => __('Add {0} to cart?', $example->name)]
                            ); ?>

                        </td>
                        <!-- <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $example->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $example->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id)]) ?>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <!-- <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p> -->
    </div>
</div>

<br><br>
<?php
$cart = $this->request->getSession()->read('Cart');
if (!empty($cart)) : ?>
    <div class="examples index content">
        <h4>Cart Summary</h4>
        <table class="text-center table">
            <thead>
                <tr class="table-active">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Product Price</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <?php $total_price = $total_quantity = 0; ?>
                <?php

                foreach ($cart as $item): ?>
                    <tr>
                        <td><?= h($item['name']) ?></td>
                        <td><?= h($item['quantity']) ?></td>
                        <td><?= h($item['price'] * $item['quantity']) ?></td>
                        <td>
                            <?= $this->Form->postLink(
                                __('Remove'),
                                ['action' => 'removeFromCart', $item['id']],
                                ['class' => 'btn btn-danger', 'confirm' => __('Remove {0} from cart?', $item['name'])]
                            );
                            ?>
                        </td>
                    </tr>
                    <?php $total_quantity +=  $item['quantity']; ?>
                    <?php $total_price += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot class="flex  align-items-center">
                <tr>
                    <th  colspan="1">Total</th>
                    <th><?= h($total_quantity) ?></th>
                    <th><?= h($total_price) ?></th>
                    <th>
                        <?= $this->Form->postLink(
                            __('Purchase'),
                            ['action' => 'purchase', '?' => ['cart' => json_encode($cart)]],
                            ['class' => 'btn btn-success font-weight-bolder', 'confirm' => __('Confirm Order?')]
                        );
                        ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><span id="exampleDetails"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // JavaScript/jQuery to populate the modal with data
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var detail = button.data('detail'); // Extract info from data-* attributes
            var name = button.data('name'); // Extract info from data-* attributes

            console.log(detail); // Debugging log

            var modal = $(this);
            modal.find('#exampleDetails').text(detail); // Update the modal's content
            modal.find('#exampleModalLabel').text(name + ' detail'); // Update the modal's content
        });
    });
</script>