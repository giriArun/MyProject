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
[user_id],[user_first_name],[user_last_name],[user_email],[user_phone],[user_terms],[isAdmin],[isActive],
[created_on],[created_by],[modified_on],[modified_by]

:::passwords:::
[password_id],[user_id_fk],[password_hash],[isOneTime](default 0, active 1, deactive 2),
[created_on],[created_by],[modified_on],[modified_by]

:::address:::
[address_id],[user_id_fk],[address],[police_station],[City_Town],[district],[pin],[state],[country],[map_url],[map_image],
[created_on],[created_by],[modified_on],[modified_by]

:::projects:::
[project_id],[user_id_fk],[project_name],[project_site_url],[project_role_id_fk],[start_date],[end_date],[project_technologies],[project_tools],[project_description],[project_image],[created_on],[created_by],[modified_on],[modified_by]

:::project_roles:::
[project_role_id],[project_role_type],[created_on],[created_by],[modified_on],[modified_by]

:::technical_skills:::
[technical_skill_id],[user_id_fk],[skill_name],[rating_scale],[created_on],[created_by],[modified_on],[modified_by]
:::educations:::
[education_id],[institution_name],[degree_name],[start_date],[end_date],[isContinue],[institution_address],[degree_detail],[created_on],[created_by],[modified_on],[modified_by]



TODO:
1. URL like my previous project(like: index.php?action=project)
first move the CV page, then move the admin page
