({
    extendsFrom: 'RecordView',
    
    mails: [],
    init: true,
    baseurl: '',
    fixmail: '',

    /**
     * @inheritdoc
     */
    initialize: function(options) {
      //  this.plugins = _.union(this.plugins || [], ['HistoricalSummary']);
        this._super('initialize', [options]);
       // this.teste();
    },
    teste: function(){
     
      },
       _render: function () {
        this._super('_render');
        console.log(' dentro do render');
        var userID= app.user.get("id");
        console.log(userID);
       
      $.get('http://docker.local/sugar/rest/v11/EdicaoPersonalizada/' + userID, function(resposta){
        console.log(' resposta da requisição ' + resposta);
      
        
        if(resposta != true){
        
        $("span[data-type=fullname]").width('100%').children('.table-cell-wrapper').width('100%').children().width('100%');

        $("span[data-fieldname=email]").on('DOMSubtreeModified', function () {
            $(".btn.removeEmail").hide();
            $(".existingAddress").each(function () {
                if ($(this).val() != this.fixmail) {
                    $(this).prop('readonly', true);
                    console.log(' tem email, bloquia');
                }
            });
        });        

      }
    }); 
    },
  
})

