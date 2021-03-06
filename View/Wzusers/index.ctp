<?php
/**
 * The MIT License (MIT)
 *
 * Webzash - Easy to use web based double entry accounting software
 *
 * Copyright (c) 2014 Prashant Shah <pshah.mumbai@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
?>
<table class="stripped">
	<tr>
		<th><?php echo $this->Paginator->sort('username', __d('webzash', 'Username')); ?></th>
		<th><?php echo $this->Paginator->sort('fullname', __d('webzash', 'Fullname')); ?></th>
		<th><?php echo $this->Paginator->sort('email', __d('webzash', 'Email')); ?></th>
		<th><?php echo $this->Paginator->sort('status', __d('webzash', 'Status')); ?></th>
		<th><?php echo $this->Paginator->sort('status', __d('webzash', 'Approved')); ?></th>
		<th><?php echo $this->Paginator->sort('role', __d('webzash', 'Role')); ?></th>
		<th><?php echo __d('webzash', 'Actions'); ?></th>
	</tr>
	<?php foreach ($wzusers as $wzuser) { ?>
		<tr>
			<td><?php echo h($wzuser['Wzuser']['username']); ?></td>
			<td><?php echo h($wzuser['Wzuser']['fullname']); ?></td>
			<td><?php echo h($wzuser['Wzuser']['email']); ?></td>
			<td><?php echo h($this->Generic->wzuser_status($wzuser['Wzuser']['status'])); ?></td>
			<td>
				<?php if ($wzuser['Wzuser']['admin_verified'] == 1) {
					echo __d('webzash', 'Yes');
				} else {
					echo __d('webzash', 'No');
				}
				?>
			</td>
			<td><?php echo h($this->Generic->wzuser_role($wzuser['Wzuser']['role'])); ?></td>
			<td>
				<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-edit')) . __d('webzash', ' Edit'), array('plugin' => 'webzash', 'controller' => 'wzusers', 'action' => 'edit', $wzuser['Wzuser']['id']), array('class' => 'no-hover', 'escape' => false)); ?>
				<?php echo $this->Html->tag('span', '', array('class' => 'link-pad')); ?>
				<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-off')) . __d('webzash', ' Password'), array('plugin' => 'webzash', 'controller' => 'wzusers', 'action' => 'resetpass', 'userid' => $wzuser['Wzuser']['id']), array('class' => 'no-hover', 'escape' => false)); ?>
				<?php echo $this->Html->tag('span', '', array('class' => 'link-pad')); ?>
				<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'glyphicon glyphicon-trash')) . __d('webzash', ' Delete'), array('plugin' => 'webzash', 'controller' => 'wzusers', 'action' => 'delete', $wzuser['Wzuser']['id']), array('class' => 'no-hover', 'escape' => false, 'confirm' => __d('webzash', 'Are you sure you want to delete the user ?'))); ?>
			</td>
		</tr>
	<?php } ?>
</table>

<div class="text-center paginate">
	<ul class="pagination">
		<?php
			echo $this->Paginator->first(__d('webzash', 'first'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
			echo $this->Paginator->prev(__d('webzash', 'prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
			echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
			echo $this->Paginator->next(__d('webzash', 'next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
			echo $this->Paginator->last(__d('webzash', 'last'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		?>
	</ul>
</div>
