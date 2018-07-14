from django.db import models
from django.urls import reverse
# Create your models here.

class Publication(models.Model):
    publication_id = models.AutoField(primary_key = True)
    title = models.CharField(max_length = 500)
    abstract = models.TextField()
    year = models.IntegerField()
    venue_name = models.CharField(max_length = 500)
    publication_choice = (('conf','conference'),('jour','journal'),('patn','patent'))
    publication_type = models.CharField(max_length= 4, choices = publication_choice)
    authors = models.TextField()
    volume = models.CharField(max_length = 20)
    number_v = models.CharField(max_length = 20)
    page_v = models.CharField(max_length = 20)
    source_code = models.FileField(upload_to='codes/')
    manuscript = models.FileField(upload_to='manuscript/')
    demo_link = models.SlugField()
    #staff_id = models.ForeignKey(to=Member, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.title


class Experience(models.Model):
    experience_id = models.AutoField(primary_key=True)
    start_time = models.DateField()
    end_time = models.DateField()
    experience_name = models.CharField(max_length = 500)
    description = models.TextField()
    main_task = models.TextField()
    #staff_id = models.ForeignKey(to = Member, on_delete=models.CASCADE)
    
    def __str__(self):
        return self.experience_name
        

class Member(models.Model):
    staff_id = models.CharField(max_length = 20, primary_key = True)
    name_en = models.CharField(max_length = 250)
    name = models.CharField(max_length = 250)
    dob = models.DateField()
    title_choice = (('Mr', 'Mr.'),('Mrs','Mrs.'),('Miss','Miss'),('Dr','Dr.'),('Prof','Prof.'),('A_Prof','A/Prof.'))
    title = models.CharField(max_length = 10, choices = title_choice, default = 'Mr')
    email = models.EmailField()
    telephone = models.CharField(max_length = 20)
    biograph = models.TextField()
    research_interests = models.TextField()
    photo = models.ImageField(upload_to='member/img/')
    abstract = models.TextField()
    position = models.CharField(max_length = 250)
    # edited by yizheng
    publication_list = models.ManyToManyField(Publication, help_text="Select the publication for this member")
    experience_list = models.ManyToManyField(Experience, help_text="Select the experience for this member")
    # edited by yizheng

    def get_absolute_url(self):
        return reverse('team:member_detail',
                       args=[self.staff_id])
    def __str__(self):
        return self.name