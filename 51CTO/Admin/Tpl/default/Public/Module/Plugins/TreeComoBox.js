/*-------------------------------------------------*  
	下拉树:
	使用方法:(comobox可用的参数一般都可用)
	{
		xtype : 'combotree',
		id:'com',
		fieldLabel : '试题分类',
		hiddenName : 'tkId',------------
		sm : 'leaf',--------------仅叶子可选
		defaultId : '2',-------------默认ID
		defaultText : '测试分类',----------默认text( 显示值 ),
		anchor : "90%",
		dataUrl : '../../tiku.do?action=getTikuTree'-----------------tree的dataUrl
	}
	使用setDefaultValue设置默认值,其他跟comobo一样
 }  
 *-----------------------------------------------------*/

Ext.ux.ComboBoxTree = Ext.extend(Ext.form.ComboBox, {
			/**
			 * ------------------------------------- 该combotree的ID
			 * -------------------------------------
			 */
			id : null,
			name : null,
			/**
			 * ------------------------------------- 作为隐藏域的name属性
			 * -------------------------------------
			 */
			hiddenName : null,

			/**
			 * ------------------------------------- 下拉树的 所有可选 all 叶子可选 leaf
			 * 文件夹可选 folder
			 * 
			 * @default false -------------------------------------
			 */
			sm : 'all',
			/**
			 * 是否可缩放
			 * 
			 * @type Boolean
			 */
			resizable : true,
			/**
			 * ----------------------- 树显示的高度，默认为200 -----------------------
			 */
			treeHeight : 200,
			/**
			 * 默认的ID和text
			 * 
			 * @type
			 */
			defaultId : null,
			defaultText : null,
			/**
			 * 空的store
			 */
			store : new Ext.data.SimpleStore({
						fields : [],
						data : [[]]
					}),

			editable : false, // 禁止手写及联想功能
			mode : 'local',
			triggerAction : 'all',
			selectedClass : '',
			onSelect : Ext.emptyFn,
			emptyText : '请选择...',

			/**
			 * -------------------------------------- 下拉树被点击事件添加一处理方法
			 * 
			 * @param node
			 *            --------------------------------------
			 */
			onTreeSelected : function(node) {
				this.onSelect(this,node);
			},
			/**
			 * 放弃这些方法:因为父类这些方法是通过读取store 取值,显然跟现在的tree中取值不一样
			 * 
			 * @param {}
			 *            v
			 */
			setDefaultValue : function(text, id) {
				if (id) {
					this.value = id;
					Ext.ux.ComboBoxTree.superclass.setValue.call(this, id);
				}
				if (text) {
					Ext.ux.ComboBoxTree.superclass.setRawValue.call(this, text);
				}
			},
			/**
			 * 一定得覆盖此方法,置空,因为这个依赖的是tree而不是store
			 */
			setValue : function() {
			},
			/**
			 * 取hiddenName的值,必须覆盖此方法
			 */
			getValue : function() {
				return Ext.isDefined(this.value) ? this.value : '';
			},
			/**
			 * 取显示text的值
			 */
			/*
			 * getRawValue:function(){ },
			 */
			/**
			 * ---------------------------------- 树的单击事件处理
			 * 
			 * @param node,event
			 *            ----------------------------------
			 */
			treeClk : function(node, e) {
//				if (node.isLeaf()) {
//					if (this.sm != 'leaf') {
//						e.stopEvent();
//						return;
//					}
//				} else {
//					if (this.sm == 'leaf') {
//						e.stopEvent();
//						return;
//					}
//				}
				if (this.hiddenName) {
					this.value = node.id;
					Ext.ux.ComboBoxTree.superclass.setValue.call(this, node.id);
				}
				Ext.ux.ComboBoxTree.superclass.setRawValue
						.call(this, node.text);
				this.collapse();// 隐藏option列表

				// 选中树节点后的触发事件
				this.fireEvent('treeselected', node);

			},

			/**
			 * 初始化 Init
			 */
			initComponent : function() {
				Ext.ux.ComboBoxTree.superclass.initComponent.call(this);
				// tree
				var comobo = this;
				var tree = new Ext.tree.TreePanel({
							rootVisible : false,
							autoScroll : true,
							border : false,
							loader : new Ext.tree.TreeLoader({
										dataUrl : this.dataUrl
									}),
							root : this.root || new Ext.tree.AsyncTreeNode(),
							tbar : [{
										text : '展开',
										handler : function() {
											tree.expandAll();
										}
									}, {
										text : '折叠',
										handler : function() {
											tree.collapseAll();
										}
									}, '-', {
										text : '清除所选',
										handler : function() {
											comobo.clearValue();
										}
									}]
						});
				this.tree = tree;
				this.tree.height = this.treeHeight;
				this.tree.containerScroll = false;
				this.tplId = Ext.id();
				this.tpl = '<div id="' + this.tplId + '" style="height:'+ this.treeHeight + ';overflow:hidden;"></div>';

				/**
				 * ----------------------- 添加treeselected事件， 选中树节点会激发这个事 件，
				 * 参数为树的节点 ------------------------
				 */
				this.addEvents('treeselected');
				this.on('treeselected',this.onTreeSelected,this);
			},

			/**
			 * ------------------ 事件监听器 Listener ------------------
			 */
			listeners : {
				'expand' : {
					fn : function() {
						if (!this.tree.rendered && this.tplId) {
							this.tree.render(this.tplId);
						}
						this.tree.show();
					},
					single : true
				},
				'render' : {
					fn : function() {
						this.tree.on('click', this.treeClk, this);
						// 初始化空值显示
						Ext.ux.ComboBoxTree.superclass.setRawValue.call(this,
								this.emptyText);
						// 初始化 默认数值
						this.setDefaultValue(this.defaultText, this.defaultId);
					},
					single : true
				},
				'beforedestroy' : {
					fn : function(cmp) {
						this.purgeListeners();
						this.tree.purgeListeners();
					}
				}
			}

		});

/**
 * --------------------------------- 将Ext.ux.ComboBoxTree注册为Ext的组件,以便使用
 * Ext的延迟渲染机制，xtype:'combotree' ---------------------------------
 */
Ext.reg('combotree', Ext.ux.ComboBoxTree);