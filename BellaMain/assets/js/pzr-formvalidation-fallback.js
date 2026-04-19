/**
 * FormValidation CDN yuklenmezse formlar ReferenceError ile kirilmasin.
 * Bu dosya FormValidation scriptlerinden HEMEN SONRA senkron calisir.
 */
(function () {
  if (typeof FormValidation !== 'undefined' && typeof FormValidation.formValidation === 'function') {
    return;
  }
  function PluginStub() {}
  window.FormValidation = {
    plugins: {
      Trigger: PluginStub,
      Bootstrap5: PluginStub,
    },
    formValidation: function (formEl) {
      return {
        validate: function () {
          if (!formEl) {
            return Promise.resolve('Invalid');
          }
          try {
            if (typeof formEl.checkValidity === 'function' && !formEl.checkValidity()) {
              return Promise.resolve('Invalid');
            }
          } catch (e) {}
          return Promise.resolve('Valid');
        },
      };
    },
  };
})();
