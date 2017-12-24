Ext.BLANK_IMAGE_URL="../Public/Ext/resources/images/default/s.gif";
Ext.QuickTips.init();
Ext.form.Field.prototype.msgTarget = 'side';

function reloadcode(){//刷新验证码函数
    var verify = document.getElementById('safecode');
    verify.setAttribute('src', '/tp17/admin/Tpl/default/Login/Verity/chknumber.php?' + Math.random());
}

Login = function(){
	var win,
		form,
		submitUrl = app + '/Public/CheckLogin/' ;

	function onSubmit(){
		this.showMask();

		form.submit({
			reset: true
		});
	}

	return{
		Init:function(){

			var formPanel = new Ext.form.FormPanel({
		        baseCls: 'x-plain',
		        baseParams: {
		        	module: 'login'
		        },
		        defaults: {
		        	width: 150
		        },
		        defaultType: 'textfield',
		        id: 'login-form',
		        items: [{
		            fieldLabel: '授权用户',
                    cls: 'user-icon' ,
                    style : "font-size: 15px" ,
		            name: 'user'
		        },{
		            fieldLabel: '密码',
                    cls: 'key-icon' ,
                    style : "font-size: 15px" ,
		            inputType: 'password',
		            name: 'pass'
		        },{
                    cls: 'randcode-icon',
                    style : "font-size: 15px" ,
                    name: 'chknumber',
                    id: 'randCode',
                    fieldLabel: '验证码',
                    maxLength: 6,
                    width: 100,
					validator: function(v){
						return true ;
					} ,
					invalidText: '验证码不正确!' ,
					maxLengthText: '超出验证码的最大字符数'
                }],
		        labelWidth:65,
		        listeners: {
					'actioncomplete': {
						fn: this.onActionComplete,
						scope: this
					},
					'actionfailed': {
						fn: this.onActionFailed,
						scope: this
					}
				},
		        region: 'center',
		        url: submitUrl
		    });

		   win = new Ext.Window({
		        buttons: [{
		        	handler: onSubmit,
		        	scope: Login,
		            text: '登陆'
		        }],
		        buttonAlign: 'right',
		        closable: false,
		        draggable: false,
		        height: 165,
		        id: 'login-win',
		        keys: {
		        	key: [13], // enter key
			        fn: onSubmit,
			        scope:this
		        },
		        layout: 'border',
		        minHeight: 165,
		        minWidth: 300,
		        plain: true,
		        resizable: false,
		        items: [
		        	formPanel
		        ],
				title: '登陆',
                iconCls: 'login-icon' ,
		        width: 300
		    });

			form = formPanel.getForm();

			formPanel.on('render', function(){
				var f = form.findField('user');

				if(f){
					f.focus();
				}
			}, this, {delay: 200});

		    win.show();
            var bd = Ext.getDom('randCode');
            var bd2 = Ext.get(bd.parentNode);
            bd2.createChild([{
            tag: 'span',
            html: ' <a href="javascript:reloadcode();">',
			style: 'margin-left:17px'
            },{
            tag: 'img',
            id: 'safecode',
            src : '/tp17/admin//Tpl/default/Login/Verity/chknumber.php?'+ Math.random(),
            align: 'absbottom' ,
			html: '</a>'
            }]);
		},

		hideMask : function(){
			this.pMask.hide();
			win.buttons[0].enable();
		},

		onActionComplete : function(f, a){
			this.hideMask();
			if(a && a.result){
				win.destroy(true);
				window.location = app;
			}
		},

		onActionFailed : function(){
			this.hideMask();
		},

		showMask : function(msg){
			if(!this.pMask){
		        this.pMask = new Ext.LoadMask(win.body, {
		        	msg: '请等待...'
		        });
			}

			if(msg){
				this.pMask.msg = msg;
			}
	    	this.pMask.show();
	    	win.buttons[0].disable();
	    }
	};
}();

Ext.onReady(Login.Init, Login, true);