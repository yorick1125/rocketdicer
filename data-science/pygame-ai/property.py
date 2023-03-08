import pygame

class Position:
    def __init__(self, x, y):
        self.x = x
        self.y = y

class Dimension:
    def __init__(self, x, y):
        self.x = x
        self.y = y

class Image:
    def __init__(self, url):
        self.url = url
        self.image = pygame.image.load(self.url)
        self.rect = self.image.get_rect()
