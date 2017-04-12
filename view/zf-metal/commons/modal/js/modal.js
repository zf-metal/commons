(function ($) { //an IIFE so safely alias jQuery to $
    $.MetalModal = function (element) { //renamed arg for readability
        this.element = (element instanceof $) ? element : $(element);
    };
    $.MetalModal.prototype = {
        theclass: 'MetalModal',
        modalId: null,
        loadingContent: "Loading...",
        modal: null,
        modalHeader: null,
        modalTitle: null,
        modalBody: null,
        modalContent: null,
        modalAlerts: null,
        modalBox: null,
        setLoadingContent: function (loadingContent) {
            this.loadingContent = loadingContent;
        },
        run: function (modalId) {

            this.modalId = modalId;
            this.modal = $('#' + this.modalId);
            this.modalContent = this.modal.find('.modal-content');
            this.modalHeader = this.modal.find('.modal-header');
            this.modalTitle = this.modal.find('.modal-title');
            this.modalbody = this.modal.find('.modal-body');
            this.modalAlerts = this.modal.find('.modal-alerts');
            this.modalBox = this.modal.find('.modal-box');
            this.clearOnHiddenOn();
        },
        clearOnHiddenOn: function () {
            var that = this;
            this.modal.on('hidden.bs.modal', function () {
                that.alerts("");
                that.box("");
            });
        },
        clearOnHiddenOff: function () {
            this.modal.on('hidden.bs.modal', function () {
            });
        },
        toggle: function () {
            this.modal.modal('toggle');
        },
        header: function (header) {
            this.modalHeader.html(header);
        },
        title: function (title) {
            this.modalTitle.html(title);
        },
        content: function (content) {
            this.modalContent.html(content);
        },
        box: function (box) {
            this.modalBox.html(box);
        },
        alerts: function (alerts) {
            this.modalAlerts.html(alerts);
        },
        loading: function () {
            this.modalBox.html(this.loadingContent);
        }

    };
}(jQuery));
