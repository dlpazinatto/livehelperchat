<?php include(erLhcoreClassDesign::designtpl('lhchat/user_settings.tpl.php'));?>

<?php
$pendingTabEnabled = erLhcoreClassModelUserSetting::getSetting('enable_pending_list',1);
$activeTabEnabled = erLhcoreClassModelUserSetting::getSetting('enable_active_list',1);
$closedTabEnabled = erLhcoreClassModelUserSetting::getSetting('enable_close_list',0);
$unreadTabEnabled = erLhcoreClassModelUserSetting::getSetting('enable_unread_list',1);
$mychatsTabEnabled = erLhcoreClassModelUserSetting::getSetting('enable_mchats_list',1);
?>

<div role="tabpanel" ng-cloak id="tabs">
		
	<!-- Nav tabs -->
	<ul class="nav nav-pills" role="tablist">
	    <?php if ($pendingTabEnabled == true) : ?>
		<li role="presentation" class="nav-item"><a class="nav-link active" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','Pending confirm');?>" href="#panel1" aria-controls="panel1" role="tab" data-bs-toggle="tab"><i class="material-icons chat-pending me-0">chat</i><span>{{pending_chats.list.length != false && pending_chats.list.length > 0 ? ' ('+pending_chats.list.length+')' : ''}}</span></a></li>
		<?php endif;?>
		
		<?php if ($activeTabEnabled == true) : ?>
		<li role="presentation" class="nav-item"><a class="nav-link" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','Active chats');?>" href="#panel2" aria-controls="panel2" role="tab" data-bs-toggle="tab"><i class="material-icons chat-active me-0">chat</i><span>{{active_chats.list.length != false && active_chats.list.length > 0 ? ' ('+active_chats.list.length+')' : ''}}</span></a></li>
		<?php endif;?>
		
		<?php if ($mychatsTabEnabled == true) : ?>
		<li role="presentation" class="nav-item"><a class="nav-link" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','My active and pending chats');?>" href="#panel3" aria-controls="panel3" role="tab" data-bs-toggle="tab"><i class="material-icons chat-active me-0">chat</i><span>{{my_chats.list.length != false && my_chats.list.length > 0 ? ' ('+my_chats.list.length+')' : ''}}</span></a></li>
		<?php endif;?>

		<?php if ($unreadTabEnabled == true) : ?>
		<li role="presentation" class="nav-item"><a class="nav-link" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','Unread messages');?>" href="#panel4" aria-controls="panel4" role="tab" data-bs-toggle="tab"><i class="material-icons chat-unread me-0">chat</i><span>{{unread_chats.list.length != false && unread_chats.list.length > 0 ? ' ('+unread_chats.list.length+')' : ''}}</span></a></li>
		<?php endif;?>
		
		<?php if ($closedTabEnabled == true) : ?>
		<li role="presentation" class="nav-item"><a class="nav-link" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','Closed chats');?>" href="#panel5" aria-controls="panel5" role="tab" data-bs-toggle="tab"><i class="material-icons chat-closed me-0">chat</i><span>{{closed_chats.list.length != false && closed_chats.list.length > 0 ? ' ('+closed_chats.list.length+')' : ''}}</span></a></li>
		<?php endif;?>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	    <?php if ($pendingTabEnabled == true) : ?>
		<div role="tabpanel" class="tab-pane active" id="panel1">
			  <?php $optinsPanel = array('panelid' => 'pendingd','limitid' => 'limitp', 'userid' => 'pendingu'); ?>
			  <?php include(erLhcoreClassDesign::designtpl('lhfront/dashboard/panels/parts/options.tpl.php'));?>				
		      <div id="pending-chat-list"><?php include(erLhcoreClassDesign::designtpl('lhchat/lists/angular_pending_list.tpl.php'));?></div>
			  <a class="btn btn-secondary btn-sm" href="<?php echo erLhcoreClassDesign::baseurl('chat/list')?>/(chat_status_ids)/0"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','All pending chats');?></a>
		</div>
		<?php endif;?>
		<?php if ($activeTabEnabled == true) : ?>
		<div role="tabpanel" class="tab-pane" id="panel2">
			 <?php $optinsPanel = array('panelid' => 'actived','limitid' => 'limita', 'userid' => 'activeu'); ?>
			 <?php include(erLhcoreClassDesign::designtpl('lhfront/dashboard/panels/parts/options.tpl.php'));?>
		     <div id="active-chat-list"><?php include(erLhcoreClassDesign::designtpl('lhchat/lists/angular_active_list.tpl.php'));?></div>
			 <a class="btn btn-secondary btn-sm" href="<?php echo erLhcoreClassDesign::baseurl('chat/list')?>/(chat_status_ids)/1"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','All active chats');?></a>
		</div>
		<?php endif;?>

		<?php if ($mychatsTabEnabled == true) : ?>
		<div role="tabpanel" class="tab-pane" id="panel3">
			 <?php $optinsPanel = array('panelid' => 'mcd','limitid' => 'limitmc'); ?>
			 <?php include(erLhcoreClassDesign::designtpl('lhfront/dashboard/panels/parts/options.tpl.php'));?>
		     <div id="active-chat-list"><?php include(erLhcoreClassDesign::designtpl('lhchat/lists/angular_my_chats_list.tpl.php'));?></div>
			 <a class="btn btn-secondary btn-sm" href="<?php echo erLhcoreClassDesign::baseurl('chat/list')?>/(chat_status_ids)/1"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','My active and pending chats');?></a>
		</div>
		<?php endif;?>
		
		<?php if ($unreadTabEnabled == true) : ?>
		<div role="tabpanel" class="tab-pane" id="panel4">
		     <div id="unread-chat-list"><?php include(erLhcoreClassDesign::designtpl('lhchat/lists/angular_unread_list.tpl.php'));?></div>
			 <a class="btn btn-secondary btn-sm" href="<?php echo erLhcoreClassDesign::baseurl('chat/list')?>/(hum)/1"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','All unread chats');?></a>
		</div>
		<?php endif;?>
		
		<?php if ($closedTabEnabled == true) : ?>
		<div role="tabpanel" class="tab-pane" id="panel5">
		     <div id="closed-chat-list"><?php include(erLhcoreClassDesign::designtpl('lhchat/lists/angular_closed_list.tpl.php'));?></div>
			 <a class="btn btn-secondary btn-sm" href="<?php echo erLhcoreClassDesign::baseurl('chat/list')?>/(chat_status_ids)/2"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('front/default','All closed chats');?></a>
		</div>
		<?php endif;?>
	</div>
</div>

<script type="text/javascript">
function addChat(chat_id,name)
{
    lhinst.startChat(chat_id,$('#tabs'),name);
    window.focus();
};

lhinst.attachTabNavigator();
</script>
