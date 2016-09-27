module.exports = function () {
  "use strict";

  return {
    all: {
      options: {
        style:  'compressed', // compress stylesheet
				'sourcemap': 'auto', // allow browser to map generated CSS
        'precision': 7, // help avoid rounding errors
      },
			src: '<%= config.source.sass %>/1face.scss',
      dest: '<%= config.app %>/<%= config.destination.css %>/1face.css',
    },
  };
};
