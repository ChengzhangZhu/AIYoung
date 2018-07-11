from django.db import models
from django.urls import reverse
# Create your models here.

class Member(models.Model):
    staff_id = models.CharField(max_length = 20, primary_key = True)
    en_name = models.CharField(max_length = 250)
    cn_name = models.CharField(max_length = 250)
    abstract = models.TextField()
    position = models.CharField(max_length = 250)
    img = models.ImageField(upload_to='member/')
    department = models.CharField(max_length = 250)
    def get_absolute_url(self):
        return reverse('member:detail',
                       args=[self.staff_id])
    def __str__(self):
        return self.cn_name