# Generated by Django 2.0.6 on 2018-07-12 23:57

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('team', '0002_auto_20180712_0134'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='member',
            name='img',
        ),
    ]