/**
 * 定义表现层
 */
Ext.onReady(function(){
        var originaltoolbar = '';
                 
                
        originaltoolbar = [ '->',{
                id: 'addButton',
                text: '退出',
                iconCls: 'add',
                tooltip: this.addtooltip,
                handler:  
                function(){
                        Ext.Msg.confirm("系统提示" , "您确定要退出系统吗？" ,function(_btn){
                                if(_btn == "yes"){
                                        Ext.Ajax.request({
                                                url:app + '/Public/logout',
                                                success : function(){
                                                       
                                                        window.opener=null;    
                                                        window.open("","_self");    
                                                        window.close(); 
                                                        window.location.href='Public/login'//关闭窗口
                                                },
                                                failure : function(){
        			           
                                                }
                                        });
                                }
                        });
			      
                },
                scope: this
        }];	
          
        header = new Ext.Panel({
                region : "north" ,
                border : false ,
                bodyBorder : false ,
                height : 25 ,
                baseCls: "topback" ,
                html : '<div align="right" style="margin-top:6px"><font face="华文细黑" size="3" ><p>欢迎你：管理员！<a href="#" onclick="javascript:alert(0)">退出系统</a></font></p></div>',
                tbar:originaltoolbar,
               
                bodyStyle : {
                        padding:'0 0 0 20px',
                        background : '#DFE8F6'
                }
        });
	 
        main = new MainPanel() ;
        menu = new MenuPanel() ;
        foot = new Ext.Panel({
                border : false,
                region : "south" ,
                height : 20 ,
                baseCls: "bottomback" ,
                html : '<div align="center" style="margin-top:4px"><font face="华文细黑" size="2" ><p>thinkphp+extjs开源CMS</p></font></div>'
        });
        var viewport = new Ext.Viewport({
                layout : "border" ,
                items : [header, menu , main , foot]
        });
}) ;