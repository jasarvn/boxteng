<?php

/**
 *
 */

  const TEMP_CONT_NAME_CONTENT = '/{%temp\w+\W+\w+.\w+\W%}|{%sect\w+\W+\w+\W%}|{%sect\w+%}/';

  const GET_WHOLE_TEMP_CONT = '/templ*\w+=\W\w+.\w+\W|section=\W\w+\W|{%section\W+\w+\W+}((.|\n)*){%sectionend%}/';

  const PATTERNS = array(
                  "/templ*\w+=\W\w+.\w+\W/",
                  "/sec\w+\W+\w+\W/",
                  "/{%section\W+\w+\W+}((.|\n)*){%sectionend%}/"
                );
