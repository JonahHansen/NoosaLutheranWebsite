def fill_template(template_text, title, current, contents_text):
    header,footer = template_text.split('!!main!!')

    new_text = template_text.replace('!!title!!', title
        ).replace('!!main!!', contents_text)

    for tab in ["!!current_home!!","!!current_cong!!","!!current_worship!!","!!current_ministry!!","!!current_events!!","!!current_contact!!"]:
        if tab == current:
            new_text = new_text.replace(tab,' class="current"')
        else:
            new_text = new_text.replace(tab,"")

    if title == 'Contact Form Response':
        footer = "'" + footer.replace("'","\\'") + "'"

        new_text = new_text.replace('!!footer!!',footer)

    return new_text

def make_template(name: str, current: str, title: str):
    with open('_template.php') as f_template:
        template_text = f_template.read()
        with open(f'_{name}', encoding="utf8") as f_contents:
            with open(f'../{name}', 'w', encoding="utf8") as f_to:
                print(f"compiling {title}")
                f_to.write(fill_template(
                    template_text,
                    title,
                    current,
                    f_contents.read()))

names = ['childsafe.html',
         'congregation.php',
         'contact.html',
         'contact-form-mailer.php',
         'facilities.html',
         'faithink.html',
         'index.php',
         'lutheran.html',
         'ministry.html',
         'purpose.html',
         'events.php',
         'weddings.php',
         'worship.php'
        ]

currents = ["!!current_ministry!!",
"!!current_cong!!",
"!!current_contact!!",
"!!current_contact!!",
"!!current_events!!",
"!!current_ministry!!",
"!!current_home!!",
"!!current_cong!!",
"!!current_ministry!!",
"!!current_cong!!",
"!!current_events!!",
"!!current_events!!",
"!!current_worship!!",
]
titles = ['Child Safe Standards',
         'Our Congregation',
         'Contact Us',
         'Contact Form Response',
         'Facilities Hire',
         'Faith Inkubators',
         'Good Shepherd Lutheran Church - Noosa',
         "What's a Lutheran?",
         'Ministry Areas',
         'Our Purpose',
         "Events",
         "Weddings",
         'Worship'
        ]

for name, current, title in zip(names, currents, titles):
    make_template(name, current, title)
