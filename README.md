# MyProject
My Project


## YouTube File
https://www.youtube.com/watch?v=nxO4kekHtMk&list=PLPS6AkdhkIeS37fZWkOsIffodzUrx11Wr

## Google Font
https://fonts.google.com/selection

## Design Motivation
https://www.wix.com/website/templates/html/professional-cv

https://www.wix.com/website-template/view/html/2622?originUrl=https%3A%2F%2Fwww.wix.com%2Fwebsite%2Ftemplates%2Fhtml%2Fprofessional-cv&tpClick=view_button&esi=81de44c3-72a5-436d-bb9a-d65a2775f6eb

## DataBase
:::users:::
[users_id],[users_first_name],[users_last_name],[users_email],[users_phone],[users_terms],[isAdmin],[isActive],
[created_on],[created_by],[modified_on],[modified_by]

:::password:::
[password_id],[users_id_fk],[password_hash],[isOneTime](default 0, active 1, deactive 2),
[created_on],[created_by],[modified_on],[modified_by]

:::address:::
[address_id],[users_id_fk],[address],[police_station],[City_Town],[district],[pin],[state],[country],[map_url],[map_image],
[created_on],[created_by],[modified_on],[modified_by]